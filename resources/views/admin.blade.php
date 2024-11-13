<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <a href="{{ route('admin.institutions') }}">Manage Institutions</a>
    <a href="{{ route('admin.faculties') }}">Manage Faculties</a>
    <a href="{{ route('admin.courses') }}">Manage Courses</a>
</div>
@endsection
