@extends('layouts.app')
@section('title', 'Tickets')
@section('subtitle', 'Reply to support requests')
@section('content')
<div class="pn_tabs">@foreach (['open', 'closed', 'all'] as $s)
    <a href="{{ route('admin.tickets', ['status' => $s]) }}"><button type="button" class="{{ $status === $s ? 'on' : '' }}">{{ ucfirst($s) }}</button></a>@endforeach</div>
@forelse ($tickets as $t)
    <div class="pn_card mb-3">
        <h4><span>{{ $t->subject }} <small style="font-weight:400">by {{ $t->user->name }} ({{ $t->user->email }}) &middot; {{ $t->created_at->diffForHumans() }}</small></span>
            <span class="pn_badge {{ $t->status === 'open' ? 'b_ok' : 'b_wait' }}">{{ $t->status }}</span></h4>
        <p>{{ $t->message }}</p>
        <form method="POST" action="{{ route('admin.tickets.update', $t) }}">@csrf @method('PUT')
            <div class="pn_field"><textarea class="pn_input" rows="2" name="admin_reply" placeholder="Write a reply...">{{ $t->admin_reply }}</textarea></div>
            <div class="d-flex gap-2 align-items-center"><select class="pn_input" name="status" style="width:auto">
                <option value="open" @selected($t->status === 'open')>Open</option><option value="closed" @selected($t->status === 'closed')>Closed</option></select>
                <button class="pn_btn sm">Save</button></div>
        </form>
    </div>
@empty
    <div class="pn_card text-center"><p class="mb-0">No tickets here.</p></div>
@endforelse
{{ $tickets->links() }}
@endsection
