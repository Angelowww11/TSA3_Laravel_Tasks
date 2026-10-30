@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="page-heading"><div><p class="eyebrow">THE PERSON BEHIND THE PLAN</p><h1>Your profile.</h1><p class="lead">One workspace. A personal view of the day.</p></div></div>
<section class="profile-panel"><div class="profile-identity"><span class="profile-avatar">AP</span><p class="eyebrow">WORKSPACE PROFILE</p><h2>{{ $user->full_name }}</h2><p>IT0049 · TW33</p></div><div class="profile-data"><dl><dt>Username</dt><dd>{{ $user->username }}</dd><dt>Full name</dt><dd>{{ $user->full_name }}</dd><dt>Email</dt><dd>{{ $user->email }}</dd></dl><p class="profile-note">Sample contact email for this learning project.</p></div></section>
@endsection
