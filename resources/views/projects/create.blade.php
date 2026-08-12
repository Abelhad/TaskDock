@extends('layouts.dashboard')
@section('page-title', 'Add Project')

@section('content')
    <div class="adminForm">
        <h2>Create New User</h2>
        <h3>Add a user account to the TaskDock workspace</h3>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf
    
            <!-- Name -->
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" class="form-label" />
    
                <x-text-input
                    id="name"
                    class="form-input"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                />
    
                <x-input-error
                    :messages="$errors->get('name')"
                    class="form-error"
                />
            </div>
    
            <!-- Email -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" class="form-label" />
    
                <x-text-input
                    id="email"
                    class="form-input"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                />
    
                <x-input-error
                    :messages="$errors->get('email')"
                    class="form-error"
                />
            </div>
    
            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" class="form-label" />
    
                <x-text-input
                    id="password"
                    class="form-input"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
    
                <x-input-error
                    :messages="$errors->get('password')"
                    class="form-error"
                />
            </div>
    
            <!-- Confirm Password -->
            <div class="form-group">
                <x-input-label
                    for="password_confirmation"
                    :value="__('Confirm Password')"
                    class="form-label"
                />
    
                <x-text-input
                    id="password_confirmation"
                    class="form-input"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
    
                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="form-error"
                />
            </div>
    
            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="register-button">Create User</button>
            </div>
    
        
        </form>
    </div>
@endsection