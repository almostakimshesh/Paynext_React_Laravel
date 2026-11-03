@extends('layouts.app')
@section('title', 'Tasks')
@section('subtitle', 'Complete tasks to earn bonus points')
@section('content')
@if (auth()->user()->isAdmin())
    <div class="mb-4 text-end"><a class="pn_btn sm" href="{{ route('tasks.create') }}"><i class="fa-solid fa-plus"></i> Add New</a></div>
@endif
@forelse ($tasks as $t)
    @if ($loop->first)<div class="pn_grid g2">@endif
    <div class="pn_card">
        <h4>
            <span>{{ $t->title }} @unless ($t->is_active)<span class="pn_badge b_wait">Inactive</span>@endunless</span>
            @if (auth()->user()->isAdmin())
                <span class="pn_acts">
                    <a class="pn_icon_btn" href="{{ route('tasks.edit', $t) }}" title="Edit"><i class="fa-solid fa-pen"></i></a>
                    <form method="POST" action="{{ route('tasks.destroy', $t) }}" onsubmit="return confirm('Delete this task?')">
                        @csrf @method('DELETE')<button class="pn_icon_btn del" title="Delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </span>
            @endif
        </h4>
        @if ($t->description)<p class="mb-2">{{ $t->description }}</p>@endif
        <div class="mb-3"><span class="pn_pill">{{ number_format($t->points) }} pts</span></div>
        @if (in_array($t->id, $done))
            <button class="pn_btn" disabled style="opacity:.6"><i class="fa-solid fa-check"></i> Completed</button>
        @elseif ($t->is_active)
            @if ($t->url)<a class="pn_btn ghost mb-2" href="{{ $t->url }}" target="_blank" rel="noopener">Open task link</a>@endif
            <form method="POST" action="{{ route('tasks.claim', $t) }}">@csrf<button class="pn_btn">Mark as Completed</button></form>
        @endif
    </div>
    @if ($loop->last)</div>@endif
@empty
    <div class="pn_card text-center"><i class="fa-regular fa-circle-check" style="font-size:40px;color:var(--border-color)"></i><p class="mt-2 mb-0">No active tasks available right now.</p></div>
@endforelse
@endsection
