<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // role / status / points / balance are never mass-assignable
    protected $fillable = ['name', 'email', 'password', 'referral_code', 'referred_by'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'points' => 'integer',
            'balance' => 'decimal:2',
            'pending_balance' => 'decimal:2',
        ];
    }

    public static function generateReferralCode(): string
    {
        do {
            $code = (string) random_int(10000000, 99999999);
        } while (static::where('referral_code', $code)->exists());

        return $code;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function referrer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function withdrawals(): HasMany
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function referralPoints(): int
    {
        return (int) $this->transactions()->where('type', 'referral')->sum('points');
    }

    /** Admin adjustment: add or remove points (and matching balance). */
    public function adjust(int $points, string $reason): Transaction
    {
        return DB::transaction(function () use ($points, $reason) {
            $user = static::query()->lockForUpdate()->findOrFail($this->id);
            $usd = round($points / config('earning.points_per_usd'), 2);

            if ($points < 0 && ($user->points + $points < 0 || (float) $user->balance + $usd < 0)) {
                throw new \RuntimeException('That would take the user below zero points or balance.');
            }

            $user->points = $user->points + $points;
            $user->balance = round((float) $user->balance + $usd, 2);
            $user->save();

            return $user->transactions()->create([
                'type' => 'adjustment',
                'description' => $reason,
                'points' => $points,
                'amount' => $usd,
                'status' => 'completed',
            ]);
        });
    }

    /**
     * Credit points (and the matching USD balance) atomically, log a transaction,
     * and pay referral commission on offer/task earnings.
     */
    public function credit(int $points, string $type, string $description, ?string $reference = null): Transaction
    {
        return DB::transaction(function () use ($points, $type, $description, $reference) {
            $user = static::query()->lockForUpdate()->findOrFail($this->id);
            $usd = round($points / config('earning.points_per_usd'), 2);

            $user->points = $user->points + $points;
            $user->balance = round((float) $user->balance + $usd, 2);
            $user->save();

            $tx = $user->transactions()->create([
                'type' => $type,
                'description' => $description,
                'points' => $points,
                'amount' => $usd,
                'status' => 'completed',
                'reference' => $reference,
            ]);

            if (in_array($type, ['offer', 'task'], true) && $user->referred_by) {
                $referrer = static::find($user->referred_by);
                $bonus = (int) floor($points * config('earning.referral_percent') / 100);
                if ($referrer && $referrer->isActive() && $bonus > 0) {
                    $referrer->credit($bonus, 'referral', 'Commission from '.$user->name);
                }
            }

            return $tx;
        });
    }
}
