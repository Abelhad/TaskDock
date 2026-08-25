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
            @if(auth()->user()->role == 'admin')
                <p>Manage and keep track of all the projects you created.</p>
            @else
                <p>Check your tasks, projects, and important stats at a glance.</p>
            @endif
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

    @if(auth()->user()->role == 'admin')
        <div class="AllDataContainer">
            <div class="leftsideData">
                <div>
                    <h3>The Projects You Created</h3>
                    <a href=" {{ route('projects.index') }} ">See all Project</a>
                </div>
                @if($projectsDsiplayed->isEmpty())
                <div class="noData">
                    <h3>No Tasks assigned to you yet</h3>
                </div>
                @else
                    <table>
                        <tr>
                            <th>title</th>
                            <th>description</th>
                            <th>status</th>
                        </tr>
                        @foreach($projectsDsiplayed as $project)
                            <tr>
                                <td> {{ $project->title }} </td>
                                <td> {{ $project->description }} </td>
                                <td>
                                    <span class="status-{{ strtolower($project->status) }}">{{ $project->status }}</span>
                                </td>
                                
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
            <div class="rightSideData">
                <div class="rightSideData1">
                    <div>
                        <h3>Your Tasks</h3>
                        <a href=" {{ route('tasks.index') }} ">See all Tasks</a>
                    </div>
                    @if($tasksDisplayed->isEmpty())
                    <div class="noData">
                        <h3>No Tasks assigned to you yet</h3>
                    </div>
                    @else
                        <table>
                            <tr>
                                <th>title</th>
                                <th>priority</th>
                                <th>status</th>
                            </tr>
                            @foreach($tasksDisplayed as $task)
                                <tr>
                                    <td> {{ $task->title }} </td>
                                    <td>
                                        <span class="status-{{ strtolower($task->priority) }}"> {{ $task->priority }} </span>
                                    </td>
                                    <td>
                                        <span class="status-{{ strtolower($task->status) }}">{{ $task->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
        
                
                <div class="rightSideData2">
                    <div>
                        <h3>The Users You Created</h3>
                        <a href=" {{ route('adminspace.index') }} "> See all Users</a>
                    </div>
                    @if($usersDisplayed->isEmpty())
                    <div class="noData">
                        <h3>No Tasks assigned to you yet</h3>
                    </div>
                    @else
                        <table>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>action</th>
                            </tr>
                            @foreach($usersDisplayed as $user)
                                <tr>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ $user->role }} </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
        @else
            <div class="AllDataContainer">
                <div class="leftsideData">
                    <div>
                        <h3>Projects You Belong To</h3>
                        <a href=" {{ route('projects.index') }} ">See all Project</a>
                    </div>
                    @if($projForUserDisplayed->isEmpty())
                    <div class="noData">
                        <h3>No Projects Created yet</h3>
                    </div>
                    @else
                        <table>
                            <tr>
                                <th>title</th>
                                <th>description</th>
                                <th>status</th>
                            </tr>
                            @foreach($projForUserDisplayed as $project)
                                <tr>
                                    <td> {{ $project->title }} </td>
                                    <td> {{ $project->description }} </td>
                                    <td>
                                        <span class="status-{{ strtolower($project->status) }}">{{ $project->status }}</span>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <div class="rightSideData">
                    <div class="rightSideData1">
                        <div>
                            <h3>Your Tasks</h3>
                            <a href=" {{ route('tasks.mytasks') }} ">See all Tasks</a>
                        </div>
                        @if($tasksDisplayed->isEmpty())
                        <div class="noData">
                            <h3>No Tasks assigned to you yet</h3>
                        </div>
                        @else
                            <table>
                                <tr>
                                    <th>title</th>
                                    <th>priority</th>
                                    <th>status</th>
                                </tr>
                                @foreach($tasksDisplayed as $task)
                                    <tr>
                                        <td> {{ $task->title }} </td>
                                        <td>
                                            <span class="status-{{ strtolower($task->priority) }}"> {{ $task->priority }} </span>
                                        </td>
                                        <td>
                                            <span class="status-{{ strtolower($task->status) }}">{{ $task->status }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        @endif
@endsection