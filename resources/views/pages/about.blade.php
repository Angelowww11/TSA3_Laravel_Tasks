@extends('layouts.app')
@section('title', 'About')
@section('content')
<div class="page-heading"><div><p class="eyebrow">ABOUT DAYBOOK</p><h1>A place for your day.</h1><p class="lead">Tasks for Today Management System, built in Laravel.</p></div><span class="outline-tag">IT0049 / TSA3</span></div>
<section class="about-intro"><span class="about-symbol">d.</span><div><h2>Start with today.</h2><p>Daybook shows the tasks scheduled for today and keeps the complete schedule a click away. A shared layout connects Today, All tasks, Profile, and About.</p><p>Laravel migrations define the database, a seeder supplies the sample records, and Eloquent retrieves the tasks and user profile. The Today page filters task dates using Philippine time.</p></div></section>
<section class="developer-panel"><p class="eyebrow">DEVELOPED BY</p><h2>Angelo Kacey N. Pineda</h2><p>TW33 · IT0049 Web System Technologies</p><p>Technical Summative Assessment 3</p></section>
@endsection
