@extends('layouts.app')
@section('title', 'Today')
@section('content')
<section class="task-welcome" data-parallax-hero>
    <img class="dashboard-hero-image" src="{{ asset('images/forest-island.png') }}" alt="Floating moss-covered island in daylight">
    <div class="task-welcome-copy"><p class="eyebrow">DAYBOOK / {{ $today->format('l, F j, Y') }}</p><h1>A little focus.<br><em>A clearer day.</em></h1><p>Your tasks for today, with room to breathe.</p><a class="button" href="{{ route('tasks.index') }}">See the full schedule <span>↗</span></a></div>
    <div class="day-stamp"><span>{{ $today->format('M') }}</span><strong>{{ $today->format('d') }}</strong><span>{{ $today->format('Y') }}</span></div>
</section>
<div class="section-heading"><h2>Tasks for today</h2><span>{{ $tasks->where('status', 'completed')->count() }} completed · {{ $tasks->where('status', '!=', 'completed')->count() }} open</span></div>
@include('tasks.table', ['listTitle' => 'Your daily plan'])
@endsection
