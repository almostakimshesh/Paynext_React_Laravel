@extends('layouts.app')
@section('title', 'Transactions')
@section('subtitle', 'Your complete earning history')
@section('content')
<div class="pn_card">
    @if ($transactions->isEmpty())
        <p class="text-center mb-0">No transactions yet.</p>
    @else
        <div class="pn_table_wrap"><table class="pn_table"><thead><tr><th>Date</th><th>Type</th><th>Description</th><th>Amount</th><th>Status</th></tr></thead><tbody>
        @foreach ($transactions as $tx)
            <tr><td>{{ $tx->created_at->format('M d, Y') }}</td><td>{{ ucfirst($tx->type) }}</td><td>{{ $tx->description }}</td><td>{{ $tx->display() }}</td>
                <td><span class="pn_badge {{ ['completed' => 'b_ok', 'pending' => 'b_wait', 'rejected' => 'b_bad'][$tx->status] ?? 'b_wait' }}">{{ $tx->status }}</span></td></tr>
        @endforeach
        </tbody></table></div>
        <div class="mt-3">{{ $transactions->links() }}</div>
    @endif
</div>
@endsection
