@extends('layouts.dashboard')
@section('page-title', 'Projects')

@section('content')
    <a href="{{ route('projects.create') }}">Add Project</a>
    <h2>projects list</h2>
@endsection