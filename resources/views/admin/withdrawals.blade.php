@extends('layouts.app')
@section('title', 'Withdrawals')
@section('subtitle', 'Review and process withdrawal requests')
@section('content')
<div class="pn_tabs">@foreach (['pending', 'approved', 'rejected', 'all'] as $s)
    <a href="{{ route('admin.withdrawals', ['status' => $s]) }}"><button type="button" class="{{ $status === $s ? 'on' : '' }}">{{ ucfirst($s) }}</button></a>@endforeach</div>
<div class="pn_card">
    @if ($withdrawals->isEmpty())<p class="text-center mb-0">No {{ $status === 'all' ? '' : $status }} withdrawals.</p>
    @else
    <div class="pn_table_wrap"><table class="pn_table"><thead><tr><th>Date</th><th>User</th><th>Method</th><th>Account</th><th>Amount</th><th>Status</th><th>Actions</th></tr></thead><tbody>
    @foreach ($withdrawals as $w)
        <tr><td>{{ $w->created_at->format('M d, Y') }}</td><td>{{ $w->user->name }}<br><small>{{ $w->user->email }}</small></td><td>{{ $w->method }}</td>
            <td style="white-space:normal;word-break:break-all;max-width:200px">{{ $w->account_details }}</td><td>${{ number_format($w->amount, 2) }}</td>
            <td><span class="pn_badge {{ ['approved' => 'b_ok', 'pending' => 'b_wait', 'rejected' => 'b_bad'][$w->status] }}">{{ $w->status }}</span></td>
            <td>@if ($w->status === 'pending')
                <div class="d-flex gap-2 align-items-center">
                    <form method="POST" action="{{ route('admin.withdrawals.approve', $w) }}" onsubmit="return confirm('Approve this withdrawal?')">@csrf<button class="pn_btn sm">Approve</button></form>
                    <form method="POST" action="{{ route('admin.withdrawals.reject', $w) }}" class="d-flex gap-2" onsubmit="return confirm('Reject and refund?')">@csrf
                        <input class="pn_input" name="admin_note" placeholder="Reason (optional)" style="padding:8px 10px;width:150px"><button class="pn_btn ghost sm">Reject</button></form>
                </div>@else<small>{{ $w->admin_note }}</small>@endif</td></tr>
    @endforeach
    </tbody></table></div>
    <div class="mt-3">{{ $withdrawals->links() }}</div>
    @endif
</div>
@endsection
