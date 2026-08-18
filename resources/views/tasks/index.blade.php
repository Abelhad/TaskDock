@extends('layouts.dashboard')
@section('page-title', 'Tasks')

@section('content')

   <div class="pageHeader">
        <div>
            <p>Manage and keep track of all the projects you created.</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="addProjectBtn">
            + Create Project
        </a>
    </div>

    @if($tasks->isEmpty())
        <h3>No Tasks Created yet</h3>
    @else
        test
    @endif

@endsection

