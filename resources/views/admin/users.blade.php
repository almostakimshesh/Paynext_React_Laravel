@extends('layouts.app')
@section('title', 'Users')
@section('subtitle', 'Search and manage accounts')
@section('content')
<form method="GET" class="mb-4 d-flex gap-2" style="max-width:420px"><input class="pn_input" name="q" value="{{ $q }}" placeholder="Search name or email"><button class="pn_btn sm">Search</button></form>
<div class="pn_card"><div class="pn_table_wrap"><table class="pn_table"><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Points</th><th>Balance</th><th>Role</th><th>Status</th><th>Adjust points</th><th></th></tr></thead><tbody>
@forelse ($users as $u)
    <tr><td>{{ $u->id }}</td><td>{{ $u->name }}</td><td>{{ $u->email }}</td><td>{{ number_format($u->points) }}</td><td>${{ number_format($u->balance, 2) }}</td><td>{{ $u->role }}</td>
        <td><span class="pn_badge {{ $u->isActive() ? 'b_ok' : 'b_bad' }}">{{ $u->status }}</span></td>
        <td><form method="POST" action="{{ route('admin.users.adjust', $u) }}" class="d-flex gap-2">@csrf
            <input class="pn_input" name="points" type="number" placeholder="+/- pts" style="width:90px;padding:8px 10px" required>
            <input class="pn_input" name="reason" placeholder="Reason" style="width:140px;padding:8px 10px" required><button class="pn_btn ghost sm">Apply</button></form></td>
        <td>@if (! $u->isAdmin())<form method="POST" action="{{ route('admin.users.toggle', $u) }}">@csrf<button class="pn_btn ghost sm">{{ $u->isActive() ? 'Suspend' : 'Activate' }}</button></form>@endif</td></tr>
@empty
    <tr><td colspan="9" class="text-center">No users found.</td></tr>
@endforelse
</tbody></table></div><div class="mt-3">{{ $users->links() }}</div></div>
@endsection
