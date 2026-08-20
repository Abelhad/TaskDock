@extends('layouts.dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <h1>test content</h1>
    @if(session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
    @endif
@endsection