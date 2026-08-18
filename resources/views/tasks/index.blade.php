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
        <div class="projectStats">

            <div class="statCard">
                <span class="statTitle">Total Tasks</span>
                <h3>{{ $tasks->count() }}</h3>
                <p>All your Tasks created</p>
            </div>

            <div class="statCard">
                <span class="statTitle">Assigned Tasks</span>
                <h3>{{ $tasks->whereNotNull('assigned_to')->count() }}</h3>
                <p>Tasks assigned to a team member</p>
            </div>

            <div class="statCard">
                <span class="statTitle">Unassigned Tasks</span>
                <h3>{{ $tasks->whereNull('assigned_to')->count() }}</h3>
                <p>Tasks waiting to be assigned</p>
            </div>


        </div>

        
    @endif

@endsection

