@extends('layouts.app')
@section('title', 'Withdraw')
@section('subtitle', 'Cash out your earnings')
@section('content')
@php $bal = (float) auth()->user()->balance; $min = (float) config('earning.min_withdraw'); @endphp
<div class="pn_card mb-4 d-flex align-items-center gap-3">
    <div class="pn_ico mb-0"><i class="fa-solid fa-wallet"></i></div>
    <div><small>Available Balance</small><b class="d-block" style="font-size:22px;color:var(--dk)">${{ number_format($bal, 2) }}</b></div>
</div>
<div class="pn_card mb-4">
    <h4>Request Withdrawal</h4>
    @if ($bal < $min)
        <p style="font-size:14px">Minimum withdrawal is <b>${{ number_format($min, 2) }}</b>. Your balance is not high enough yet, so requests will be declined until it is.</p>
    @endif
        <form method="POST" action="{{ route('withdraw.store') }}" novalidate>
            @csrf
            <div class="pn_field"><select class="pn_input" name="method" required>
                <option value="">Select payment method</option>
                @foreach (config('earning.methods') as $m)<option value="{{ $m }}" @selected(old('method') === $m)>{{ $m }}</option>@endforeach
            </select></div>
            <div class="pn_field"><input class="pn_input" name="amount" type="number" step="0.01" min="{{ $min }}" value="{{ old('amount') }}" placeholder="Amount (USD), min ${{ number_format($min, 2) }}" required></div>
            <div class="pn_field"><input class="pn_input" name="account_details" value="{{ old('account_details') }}" placeholder="Account details (number/address)" required></div>
            <button class="pn_btn">Request Withdrawal</button>
        </form>
</div>
@if ($withdrawals->isNotEmpty())
<div class="pn_card"><h4>Recent Requests</h4>
    <div class="pn_table_wrap"><table class="pn_table"><thead><tr><th>Date</th><th>Method</th><th>Amount</th><th>Status</th><th>Note</th></tr></thead><tbody>
    @foreach ($withdrawals as $w)
        <tr><td>{{ $w->created_at->format('M d, Y') }}</td><td>{{ $w->method }}</td><td>${{ number_format($w->amount, 2) }}</td>
            <td><span class="pn_badge {{ ['approved' => 'b_ok', 'pending' => 'b_wait', 'rejected' => 'b_bad'][$w->status] }}">{{ $w->status }}</span></td><td>{{ $w->admin_note }}</td></tr>
    @endforeach
    </tbody></table></div>
</div>
@endif
@endsection
