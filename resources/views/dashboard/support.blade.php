@extends('layouts.app')
@section('title', 'Support')
@section('subtitle', 'Need help? Submit a ticket')
@section('content')
<div class="pn_card mb-4">
    <h4>New Ticket</h4>
    <form method="POST" action="{{ route('support.store') }}" novalidate>
        @csrf
        <div class="pn_field"><input class="pn_input" name="subject" value="{{ old('subject') }}" placeholder="Subject" required></div>
        <div class="pn_field"><textarea class="pn_input" rows="4" name="message" placeholder="Describe your issue..." required>{{ old('message') }}</textarea></div>
        <button class="pn_btn sm"><i class="fa-regular fa-paper-plane"></i> Submit Ticket</button>
    </form>
</div>
<div class="pn_card"><h4>Your Tickets</h4>
    @forelse ($tickets as $t)
        <div class="pn_ticket"><div><b>{{ $t->subject }}</b><small>{{ $t->message }}</small>
            @if ($t->admin_reply)<small style="color:var(--ac);margin-top:6px"><i class="fa-solid fa-reply"></i> Support: {{ $t->admin_reply }}</small>@endif</div>
            <span class="pn_badge {{ $t->status === 'open' ? 'b_ok' : 'b_wait' }}">{{ $t->status }}</span></div>
    @empty
        <p class="mb-0">No tickets yet.</p>
    @endforelse
</div>
@endsection
