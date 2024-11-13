<!-- resources/views/admin/institutions.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Institutions</h1>

    <ul>
        @foreach($institutions as $institution)
            <li>{{ $institution->name }} - {{ $institution->address }} - {{ $institution->contact_email }}</li>
        @endforeach
    </ul>
</div>
@endsection
