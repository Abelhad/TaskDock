@extends('layouts.dashboard')
@section('page-title', 'Dashboard')

@section('content')
    @if(session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="pageHeader">
        <div>
            <p>Manage and keep track of all the projects you created.</p>
        </div>

        <div>
            <a href="{{ route('projects.create') }}" class="addProjectBtn">
                + Create Project
            </a>
            <a href="{{ route('tasks.create') }}" class="addProjectBtn">
                + Create Task
            </a>
        </div>
    </div>
    <div class="projectStats">
        <div class="statCard">
            <span class="statTitle">Total Tasks</span>
            <h3>{{ $myTasks->count() }}</h3>
            <p>All your Tasks</p>
        </div>
        @if(auth()->user()->role == 'admin')
            <div class="statCard">
                <span class="statTitle">Total Projects</span>
                <h3>{{ $projects->count() }}</h3>
                <p>All your projects</p>
            </div>

            <div class="statCard">
                <span class="statTitle">Total Users</span>
                <h3>{{ $users->count() }}</h3>
                <p>All your users</p>
            </div>

            <div class="statCard">
                <span class="statTitle">Total Tasks</span>
                <h3>{{ $allTasksCreated->count() }}</h3>
                <p>All Tasks Created</p>
            </div>

        @else
            <div class="statCard">
                <span class="statTitle">Total Projects</span>
                <h3>{{ $projectsUserBelongsTo->count() }}</h3>
                <p>All projects you are a member in </p>
            </div>

            <div class="statCard">
                <span class="statTitle">Total Overdue Tasks</span>
                <h3>{{ $overdueTasks }}</h3>
                <p>Tasks past their due date </p>
            </div>
        @endif
    </div>
@endsection