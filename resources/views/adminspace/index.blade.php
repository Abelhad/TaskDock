@extends('layouts.dashboard')
@section('page-title', 'Users')

@section('content')
    <div class="pageHeader">
        <div>
            <p>Manage the users you created and their project assignments.</p>
        </div>

        <a href="{{ route('adminspace.create') }}" class="addUserBtn">
            + Add User
        </a>
    </div>

    <div class="userStats">

        <div class="statCard">
            <span class="statTitle">Total Users</span>
            <h3>{{ $users->count() }}</h3>
            <p>Users you created</p>
        </div>

        <div class="statCard">
            <span class="statTitle">Assigned Users</span>
            <h3>{{ $usersWithProjects }}</h3>
            <p>Users assigned to projects</p>
        </div>

        <div class="statCard">
            <span class="statTitle">Unassigned Users</span>
            <h3>{{ $usersWithNoProjects }}</h3>
            <p>Users without a project</p>
        </div>

        

    </div>
    @if($users->isEmpty())
        <div class="noData">
            <h3>No Users Created</h3>
        </div>
    @else
        <div class="usersCreatedContent">
            <div>
                <h3>The Users You Created</h3>
                <a href=" {{ route('adminspace.create') }} ">Add Users</a>
            </div>
            <table>
                <tr>
                    <th>name</th>
                    <th>email</th>
                    <th>role</th>
                    <th>action</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->role }} </td>
                        <td>
                            <a href=" {{ route('adminspace.edit', $user) }} ">Modify</a>
                            <form action="{{ route('adminspace.destroy', $user) }}" method="post">
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