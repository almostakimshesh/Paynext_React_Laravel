<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'pending');

        $withdrawals = Withdrawal::with('user')
            ->when($status !== 'all', fn ($q) => $q->where('status', $status))
            ->latest()->paginate(15)->withQueryString();

        return view('admin.withdrawals', compact('withdrawals', 'status'));
    }

    public function approve(Withdrawal $withdrawal)
    {
        $ok = DB::transaction(function () use ($withdrawal) {
            $w = Withdrawal::query()->lockForUpdate()->findOrFail($withdrawal->id);
            if ($w->status !== 'pending') {
                return false;
            }
            $user = User::query()->lockForUpdate()->findOrFail($w->user_id);
            $user->pending_balance = max(0, round((float) $user->pending_balance - (float) $w->amount, 2));
            $user->save();

            $w->update(['status' => 'approved', 'processed_at' => now()]);
            Transaction::whereKey($w->transaction_id)->update(['status' => 'completed']);

            return true;
        });

        return back()->with($ok ? 'success' : 'error', $ok ? 'Withdrawal approved.' : 'This withdrawal was already processed.');
    }

    public function reject(Request $request, Withdrawal $withdrawal)
    {
        $data = $request->validate(['admin_note' => ['nullable', 'string', 'max:255']]);

        $ok = DB::transaction(function () use ($withdrawal, $data) {
            $w = Withdrawal::query()->lockForUpdate()->findOrFail($withdrawal->id);
            if ($w->status !== 'pending') {
                return false;
            }
            $user = User::query()->lockForUpdate()->findOrFail($w->user_id);
            $user->pending_balance = max(0, round((float) $user->pending_balance - (float) $w->amount, 2));
            $user->balance = round((float) $user->balance + (float) $w->amount, 2); // refund
            $user->save();

            $w->update(['status' => 'rejected', 'admin_note' => $data['admin_note'] ?? null, 'processed_at' => now()]);
            Transaction::whereKey($w->transaction_id)->update(['status' => 'rejected']);

            return true;
        });

        return back()->with($ok ? 'success' : 'error', $ok ? 'Withdrawal rejected and refunded.' : 'This withdrawal was already processed.');
    }
}
