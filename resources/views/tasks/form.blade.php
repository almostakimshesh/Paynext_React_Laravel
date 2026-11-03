@extends('layouts.app')
@php $editing = isset($task); @endphp
@section('title', $editing ? 'Edit Task' : 'Add New Task')
@section('subtitle', 'Tasks reward points once per user.')
@section('content')
<div class="pn_card" style="max-width:640px">
    <form method="POST" action="{{ $editing ? route('tasks.update', $task) : route('tasks.store') }}" novalidate>
        @csrf @if ($editing) @method('PUT') @endif
        <div class="pn_field"><label>Title</label><input class="pn_input" name="title" value="{{ old('title', $task->title ?? '') }}" required></div>
        <div class="pn_field"><label>Description (optional)</label><input class="pn_input" name="description" value="{{ old('description', $task->description ?? '') }}"></div>
        <div class="pn_field"><label>Link (optional)</label><input class="pn_input" name="url" value="{{ old('url', $task->url ?? '') }}" placeholder="https://"></div>
        <div class="pn_field"><label>Points reward</label><input class="pn_input" type="number" min="1" name="points" value="{{ old('points', $task->points ?? 50) }}" required></div>
        <div class="pn_field"><label class="mb-0"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $task->is_active ?? true))> Active (visible to users)</label></div>
        <div class="d-flex gap-2"><button class="pn_btn sm">Save</button><a class="pn_btn ghost sm" href="{{ route('tasks.index') }}">Cancel</a></div>
    </form>
</div>
@endsection
