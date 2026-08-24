@extends('layouts.dashboard')
@section('page-title', 'Edit Task')

@section('content')

    <div class="adminForm">
        <h2>Edit Task</h2>
        <h3>Update this task in your TaskDock project</h3>
        <form action="{{ route('tasks.update', $task) }}" method="post">
            @csrf
            @method('PUT')
            <!-- Project -->
            <div class="form-group">
                <x-input-label for="project_id" :value="__('Project')" class="form-label" />

                <select
                    id="project_id"
                    name="project_id"
                    class="form-input"
                    required
                >
                    <option value="">Select a project</option>

                    @foreach($projects as $project)
                        <option
                            value="{{ $project->id }}"
                            {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}
                        >
                            {{ $project->title }}
                        </option>
                    @endforeach
                </select>

                <x-input-error
                    :messages="$errors->get('project_id')"
                    class="form-error"
                />
            </div>

            <!-- Assigned To -->
            <div class="form-group">
                <x-input-label for="assigned_to" :value="__('Assign To')" class="form-label" />

                <select
                    id="assigned_to"
                    name="assigned_to"
                    class="form-input"
                >
                    <option value="">Unassigned</option>
                    <option
                        value="{{ $admin_id }}"
                        {{ old('assigned_to', $task->assigned_to) == $admin_id ? 'selected' : '' }}
                    >
                        admin
                    </option>
                    
                    @foreach($users as $user)
                        <option
                            value="{{ $user->id }}"
                            {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}
                        >
                            {{ $user->name }}
                        </option>
                    @endforeach
                    
                </select>

                <x-input-error
                    :messages="$errors->get('assigned_to')"
                    class="form-error"
                />
            </div>

            <!-- Title -->
            <div class="form-group">
                <x-input-label for="title" :value="__('Title')" class="form-label" />

                <x-text-input
                    id="title"
                    class="form-input"
                    type="text"
                    name="title"
                    :value="$task->title"
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
                >{{ $task->description }}</textarea>

                <x-input-error
                    :messages="$errors->get('description')"
                    class="form-error"
                />
            </div>

            <!-- Priority -->
            <div class="form-group">
                <x-input-label for="priority" :value="__('Priority')" class="form-label" />

                <select
                    id="priority"
                    name="priority"
                    class="form-input"
                    required
                >
                    <option value="low" {{ old('priority', $task->priority) === 'low' ? 'selected' : '' }}>
                        Low
                    </option>

                    <option value="medium" {{ old('priority', $task->priority) === 'medium' ? 'selected' : '' }}>
                        Medium
                    </option>

                    <option value="high" {{ old('priority', $task->priority) === 'high' ? 'selected' : '' }}>
                        High
                    </option>
                </select>

                <x-input-error
                    :messages="$errors->get('priority')"
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
                    required
                >
                    <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="in_progress" {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}>
                        In Progress
                    </option>

                    <option value="completed" {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>

                <x-input-error
                    :messages="$errors->get('status')"
                    class="form-error"
                />
            </div>

            <!-- Due Date -->
            <div class="form-group">
                <x-input-label for="due_date" :value="__('Due Date')" class="form-label" />

                <x-text-input
                    id="due_date"
                    class="form-input"
                    type="date"
                    name="due_date"
                    :value="$task->due_date"
                />

                <x-input-error
                    :messages="$errors->get('due_date')"
                    class="form-error"
                />
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="register-button">
                    Edit Task
                </button>
            </div>

    </form>
    </div>


@endsection