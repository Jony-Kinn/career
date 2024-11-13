<!-- resources/views/student/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Dashboard</h1>

    <!-- Display Courses -->
    <h2>Available Courses</h2>
    <form action="{{ route('student.apply') }}" method="POST">
        @csrf
        <label for="course_id">Choose a Course:</label>
        <select name="course_id" required>
            <option value="">Select Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }} ({{ $course->faculty->name }})</option>
            @endforeach
        </select>
        <button type="submit">Apply</button>
    </form>

    <!-- Display Application Status -->
    <h3>Your Applications</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Course</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->course->name }}</td>
                    <td>{{ ucfirst($application->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
