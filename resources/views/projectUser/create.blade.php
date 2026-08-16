@extends('layouts.dashboard')
@section('page-title', 'Add Project')

@section('content')
    <div class="adminForm">
        <h2>Link user to {{ $project->title }}</h2>
        <h3>Add users to the project and start collaborating</h3>
        <form action="{{ route('projectuser.store', ['project' => $project->id]) }}" method="post">
            @csrf

            <div class="form-group">
                <x-input-label for="users" :value="__('users')" class="form-label" />
                    <div class="userCheckboxList">
                        @foreach($users as $user)
                        @if(!$project->members->contains($user))
                        <div>
                            <input type="checkbox" 
                            name="users[]"
                            value="{{ $user->id }}"
                            >
                            {{ $user->name }}
                        </div>
                        @endif
                        
                        @endforeach
                    </div>
                    
                </select>

                <x-input-error
                    :messages="$errors->get('users')"
                    class="form-error"
                />
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="register-button">Create Project</button>
            </div>
    
        
        </form>
    </div>
@endsection