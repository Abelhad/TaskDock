@extends('layouts.dashboard')
@section('page-title', 'My Tasks')

@section('content')

   <div class="pageHeader">
        <div>
            <p>Manage and keep track of all the tasks you created.</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="addProjectBtn">
            + Create Task
        </a>
    </div>

    @if($tasks->isEmpty())
        <h3>No Tasks Created yet</h3>
    @else
        <div class="projectStats">

            <div class="statCard">
                <span class="statTitle">Total Tasks</span>
                <h3>{{ $tasks->count() }}</h3>
                <p>All your Tasks</p>
            </div>

            <div class="statCard">
                <span class="statTitle">Overdue Tasks</span>
                <h3>{{ $overdueTasks }}</h3>
                <p>Tasks past their due date</p>
            </div>

            <div class="statCard">
                <span class="statTitle">Upcoming Tasks</span>
                <h3>{{ $upcomingTasks }}</h3>
                <p>Tasks that still need to be completed</p>
            </div>


        </div>

        <div class="usersCreatedContent">
            <div>
                <h3>Your Tasks</h3>
                <a href=" {{ route('tasks.create') }} ">Add Tasks</a>
            </div>
            <table>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>project</th>
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

