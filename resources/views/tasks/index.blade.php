@extends('layouts.app')
@section('title', 'All tasks')
@section('content')
<div class="page-heading"><div><p class="eyebrow">THE COMPLETE SCHEDULE</p><h1>All your tasks.</h1><p class="lead">Yesterday, today, and what comes next. Ordered by date.</p></div><a class="button secondary" href="{{ route('home') }}">Back to today ↗</a></div>
@include('tasks.table', ['listTitle' => 'Task list'])
@endsection
