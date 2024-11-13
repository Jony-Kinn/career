<!-- resources/views/admin/faculties.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Faculties</h1>

    <ul>
        @foreach($faculties as $faculty)
            <li>{{ $faculty->name }} ({{ $faculty->institution->name }})</li>
        @endforeach
    </ul>
</div>
@endsection
