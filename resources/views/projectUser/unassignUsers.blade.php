@extends('layouts.dashboard')
@section('page-title', 'Add Project')

@section('content')
    <div class="adminForm">
        <h2>Unassign users from {{ $project->title }}</h2>
        <h3>Add users to the project and start collaborating</h3>

        <form action="{{ route('projectuser.unassign', ['project' => $project->id]) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="form-group">
                <x-input-label for="users" :value="__('Users')" class="form-label" />

                <div class="userCheckboxList">
                    @foreach($assignedusers as $user)
                        <div>
                            <input
                                type="checkbox"
                                name="users[]"
                                value="{{ $user->id }}"
                            >
                            {{ $user->name }}
                        </div>
                    @endforeach
                </div>

                <x-input-error
                    :messages="$errors->get('users')"
                    class="form-error"
                />
            </div>

            <div class="form-actions">
                <button type="submit" class="register-button">
                    Unassign Users
                </button>
            </div>
        </form>
    </div>
@endsection