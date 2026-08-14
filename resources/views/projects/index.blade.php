@extends('layouts.dashboard')
@section('page-title', 'Projects')

@section('content')
    @if($projects->isEmpty())
        <h3>No Projects Created</h3>
    @else
        {{-- Page Header --}}
        <div class="pageHeader">
            <div>
                <p>Manage and keep track of all the projects you created.</p>
            </div>

            <a href="{{ route('projects.create') }}" class="addProjectBtn">
                + Create Project
            </a>
        </div>

        {{-- Statistics --}}
        <div class="projectStats">

            <div class="statCard">
                <span class="statTitle">Total Projects</span>
                <h3>{{ $projects->count() }}</h3>
                <p>All your projects</p>
            </div>

            <div class="statCard">
                <span class="statTitle">In Progress</span>
                <h3>{{ $projects->where('status', 'active')->count() }}</h3>
                <p>Currently active & ongoing</p>
            </div>

            <div class="statCard">
                <span class="statTitle">Completed</span>
                <h3>{{ $projects->where('status', 'completed')->count() }}</h3>
                <p>Finished projects</p>
            </div>

            <div class="statCard">
                <span class="statTitle">Archived</span>
                <h3>{{ $projects->where('status', 'archived')->count() }}</h3>
                <p>Archived & on hold</p>
            </div>

        </div>
        <div class="usersCreatedContent">
            <div>
                <h3>The Projects You Created</h3>
                <a href=" {{ route('projects.create') }} ">Add Project</a>
            </div>
            <table>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td> {{ $project->title }} </td>
                        <td> {{ $project->description }} </td>
                        <td> {{ $project->status }} </td>
                        <td>
                            <a href="">Modify</a>
                            <form action="" method="post">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

@endsection