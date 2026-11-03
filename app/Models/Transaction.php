<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['amount' => 'decimal:2', 'points' => 'integer'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** "+250 pts" for earnings, "-$10.00" for withdrawals. */
    public function display(): string
    {
        if ($this->points !== 0) {
            return ($this->points > 0 ? '+' : '').number_format($this->points).' pts';
        }

        return ((float) $this->amount < 0 ? '-' : '+').'$'.number_format(abs((float) $this->amount), 2);
    }
}
