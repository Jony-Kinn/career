<!-- resources/views/admin/courses.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Courses</h1>

    <ul>
        @foreach($courses as $course)
            <li>{{ $course->name }} - {{ $course->description }} ({{ $course->faculty->name }})</li>
        @endforeach
    </ul>
</div>
@endsection
