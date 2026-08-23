@extends('layouts.dashboard')
@section('page-title', 'Edit Project')

@section('content')
    <div class="adminForm">
        <h2>Create New User</h2>
        <h3>Add a user account to the TaskDock workspace</h3>
        <form action="{{ route('projects.update', $project) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <x-input-label for="title" :value="__('Title')" class="form-label" />

                <x-text-input
                    id="title"
                    class="form-input"
                    type="text"
                    name="title"
                    :value="$project->title"
                    required
                    autofocus
                />

                <x-input-error
                    :messages="$errors->get('title')"
                    class="form-error"
                />
            </div>

            <!-- Description -->
            <div class="form-group">
                <x-input-label for="description" :value="__('Description')" class="form-label" />

                <textarea
                    id="description"
                    class="form-input"
                    name="description"
                    rows="4"
                >{{ $project->description }}</textarea>

                <x-input-error
                    :messages="$errors->get('description')"
                    class="form-error"
                />
            </div>

            <!-- Status -->
            <div class="form-group">
                <x-input-label for="status" :value="__('Status')" class="form-label" />

                <select
                    id="status"
                    name="status"
                    class="form-input"
                >
                    <option value="active" {{ old('status', $project->status) === 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="completed" {{ old('status', $project->status) === 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                    <option value="archived" {{ old('status', $project->status) === 'archived' ? 'selected' : '' }}>
                        Archived
                    </option>
                </select>

                <x-input-error
                    :messages="$errors->get('status')"
                    class="form-error"
                />
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="register-button">Modify Project</button>
            </div>
    
        
        </form>
    </div>
@endsection