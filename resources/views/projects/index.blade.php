@extends('layouts.dashboard')
@section('page-title', 'Projects')

@section('content')
    <a href="{{ route('projects.create') }}">Add Project</a>
    <h3>Project list</h3>
@endsection