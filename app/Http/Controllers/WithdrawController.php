<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class WithdrawController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.withdraw', [
            'withdrawals' => $request->user()->withdrawals()->latest()->limit(10)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $min = (float) config('earning.min_withdraw');

        $data = $request->validate([
            'method' => ['required', Rule::in(config('earning.methods'))],
            'amount' => ['required', 'numeric', 'min:'.$min],
            'account_details' => ['required', 'string', 'min:3', 'max:255'],
        ], [
            'amount.min' => 'The minimum withdrawal is $'.number_format($min, 2).'.',
        ]);

        $amount = round((float) $data['amount'], 2);

        try {
            DB::transaction(function () use ($request, $data, $amount) {
                $user = User::query()->lockForUpdate()->findOrFail($request->user()->id);

                if ((float) $user->balance < $amount) {
                    throw new \RuntimeException('Insufficient balance.');
                }

                $user->balance = round((float) $user->balance - $amount, 2);
                $user->pending_balance = round((float) $user->pending_balance + $amount, 2);
                $user->save();

                $tx = $user->transactions()->create([
                    'type' => 'withdrawal',
                    'description' => 'Withdrawal via '.$data['method'],
                    'amount' => -$amount,
                    'status' => 'pending',
                ]);

                $user->withdrawals()->create([
                    'transaction_id' => $tx->id,
                    'method' => $data['method'],
                    'amount' => $amount,
                    'account_details' => $data['account_details'],
                ]);
            });
        } catch (\RuntimeException $e) {
            return back()->withErrors(['amount' => $e->getMessage()])->withInput();
        }

        return back()->with('success', 'Withdrawal requested. It will be reviewed shortly.');
    }
}
