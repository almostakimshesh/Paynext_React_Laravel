@extends('layouts.app')
@php $editing = isset($offerwall); @endphp
@section('title', $editing ? 'Edit Offerwall' : 'Add New Offerwall')
@section('subtitle', 'Offerwalls are shown to all users on the Offerwalls page.')
@section('content')
<div class="pn_card" style="max-width:640px">
    <form method="POST" action="{{ $editing ? route('offerwalls.update', $offerwall) : route('offerwalls.store') }}" novalidate>
        @csrf @if ($editing) @method('PUT') @endif
        <div class="pn_field"><label>Name</label><input class="pn_input" name="name" value="{{ old('name', $offerwall->name ?? '') }}" required></div>
        <div class="pn_field"><label>Description (optional)</label><input class="pn_input" name="description" value="{{ old('description', $offerwall->description ?? '') }}"></div>
        <div class="pn_field"><label>Offerwall URL</label>
            <input class="pn_input" name="url" value="{{ old('url', $offerwall->url ?? '') }}" placeholder="https://wall.example.com/?app_id=123&user={user_id}">
            <small>Use <code>{user_id}</code> where the offerwall expects the user's ID.</small></div>
        <div class="pn_field"><label class="mb-0"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $offerwall->is_active ?? true))> Active (visible to users)</label></div>
        @if ($editing)
            <div class="pn_field"><label>Postback URL (give this to the offerwall)</label>
                <code style="display:block;word-break:break-all">{{ route('postback', $offerwall) }}?user_id={user_id}&amp;points={points}&amp;txn_id={txn_id}&amp;secret=YOUR_SECRET</code>
                <small>Set <code>OFFERWALL_POSTBACK_SECRET</code> in your <code>.env</code>. Parameter names may differ per network.</small></div>
        @endif
        <div class="d-flex gap-2"><button class="pn_btn sm">Save</button><a class="pn_btn ghost sm" href="{{ route('offerwalls.index') }}">Cancel</a></div>
    </form>
</div>
@endsection
