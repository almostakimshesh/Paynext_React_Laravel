@extends('layouts.app')
@section('title', 'Offerwalls')
@section('subtitle', 'Complete offers to earn points')
@section('content')
@if (auth()->user()->isAdmin())
    <div class="mb-4 text-end"><a class="pn_btn sm" href="{{ route('offerwalls.create') }}"><i class="fa-solid fa-plus"></i> Add New</a></div>
@endif
<div class="pn_grid g2">
    @forelse ($walls as $w)
        @php $s = $stats[$w->id] ?? null; @endphp
        <div class="pn_card">
            <h4>
                <span>{{ $w->name }} @unless ($w->is_active)<span class="pn_badge b_wait">Inactive</span>@endunless</span>
                @if (auth()->user()->isAdmin())
                    <span class="pn_acts">
                        <a class="pn_icon_btn" href="{{ route('offerwalls.edit', $w) }}" title="Edit"><i class="fa-solid fa-pen"></i></a>
                        <form method="POST" action="{{ route('offerwalls.destroy', $w) }}" onsubmit="return confirm('Delete {{ addslashes($w->name) }}?')">
                            @csrf @method('DELETE')
                            <button class="pn_icon_btn del" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </span>
                @endif
            </h4>
            @if ($w->description)<p class="mb-2">{{ $w->description }}</p>@endif
            <div class="mb-3"><span class="pn_pill">{{ $s->c ?? 0 }} completed</span> <span class="pn_pill">{{ number_format($s->p ?? 0) }} pts earned</span></div>
            @if (($w->url || config('earning.demo_offers')) && $w->is_active)
                <a class="pn_btn" href="{{ route('offerwalls.go', $w) }}" target="_blank" rel="noopener"><i class="fa-solid fa-arrow-up-right-from-square"></i> Start Earning</a>
            @else
                <button class="pn_btn" disabled style="opacity:.5;cursor:not-allowed">Unavailable</button>
            @endif
        </div>
    @empty
        <div class="pn_card text-center" style="grid-column:1/-1"><p class="mb-0">No offerwalls available right now.</p></div>
    @endforelse
</div>
@endsection
