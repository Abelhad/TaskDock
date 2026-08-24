@extends('layouts.dashboard')
@section('page-title', 'Tasks')

@section('content')

   <div class="pageHeader">
        <div>
            <p>Manage and keep track of all the tasks you created.</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="addProjectBtn">
            + Create Task
        </a>
    </div>

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
    @if($tasks->isEmpty())
        <div class="noData">
            <h3>No Tasks Created yet</h3>
        </div>
    @else

        <div class="usersCreatedContent">
            <div>
                <h3>The Tasks You Created</h3>
                <a href=" {{ route('tasks.create') }} ">Add Tasks</a>
            </div>
            <table>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>project</th>
                    <th>assigned to</th>
                    <th>due date</th>
                    <th>priority</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
                @foreach($tasks as $task)
                    <tr>
                        <td> {{ $task->title }} </td>
                        <td> {{ $task->description }} </td>
                        <td> {{ $task->project->title }} </td>
                        <td>
                            @if($task->assignee)
                                {{ $task->assignee->name }}
                            @else
                                --
                            @endif
                        </td>
                        <td>
                            {{ $task->due_date ?? '--' }}
                        </td>
                        <td>
                            <span class="status-{{ strtolower($task->priority) }}"> {{ $task->priority }} </span>
                        </td>
                        <td>
                            <span class="status-{{ strtolower($task->status) }}">{{ $task->status }}</span>
                        </td>
                        <td>
                            <a href="">Modify</a>
                            <form action=" {{ route('tasks.destroy', $task) }} " method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
    @if(session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
    @endif
@endsection

