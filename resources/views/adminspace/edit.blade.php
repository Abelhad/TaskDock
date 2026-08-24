@extends('layouts.dashboard')
@section('page-title', 'Modify User')

@section('content')
<div class="">
    <div class="adminForm">
        <h2>Edit User</h2>
        <h3>Update this user account in the TaskDock workspace</h3>
        <form action="{{ route('adminspace.update', $user) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" class="form-label" />
    
                <x-text-input
                    id="name"
                    class="form-input"
                    type="text"
                    name="name"
                    :value="$user->name"
                    required
                    autofocus
                    autocomplete="name"
                />
    
                <x-input-error
                    :messages="$errors->get('name')"
                    class="form-error"
                />
            </div>
    
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" class="form-label" />
    
                <x-text-input
                    id="email"
                    class="form-input"
                    type="email"
                    name="email"
                    :value="$user->email"
                    required
                    autocomplete="username"
                />
    
                <x-input-error
                    :messages="$errors->get('email')"
                    class="form-error"
                />
            </div>
    
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" class="form-label" />
    
                <x-text-input
                    id="password"
                    class="form-input"
                    type="password"
                    name="password"
                    autocomplete="new-password"
                />
    
                <x-input-error
                    :messages="$errors->get('password')"
                    class="form-error"
                />
            </div>
    
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
                    autocomplete="new-password"
                />
    
                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="form-error"
                />
            </div>

            <div class="form-group">
                <x-input-label for="role" :value="__('Role')" class="form-label" />

                <select
                    id="role"
                    name="role"
                    class="form-input"
                >
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>
                        admin
                    </option>

                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>
                        user
                    </option>
                </select>

                <x-input-error
                    :messages="$errors->get('role')"
                    class="form-error"
                />
            </div>
    
            <div class="form-actions">
                <button type="submit" class="register-button">Edit User</button>
            </div>
    
        
        </form>
    </div>
</div>
@endsection