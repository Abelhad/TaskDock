<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="dashContainer">
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('taskdock-logo-updated.png') }}" alt="TaskDock">
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href=" {{ route('projects.index') }} " class="{{ request()->routeIs('projects.index') ? 'active' : '' }}">Projects</a>
                <a href=" {{ route('projects.create') }} " class="{{ request()->routeIs('projects.create') ? 'active' : '' }}">Add Projects</a>
                <a href=" {{ route('tasks.index') }} " class="{{ request()->routeIs('tasks.index') ? 'active' : '' }}">All Tasks</a>
                <a href=" {{ route('tasks.mytasks') }} " class="{{ request()->routeIs('tasks.mytasks') ? 'active' : '' }}">My Tasks</a>
                <a href=" {{ route('adminspace.create') }} " class="{{ request()->routeIs('adminspace.create') ? 'active' : '' }}">Add Users</a>
                <a href=" {{ route('adminspace.index') }} " class="{{ request()->routeIs('adminspace.index') ? 'active' : '' }}">Users</a>
            </div>
        </div>
        <div class="rightSide">
            <div class="header">
                <button>logout</button>
            </div>
            <div class="content">
                <h2>TaskDock <span id="titleColor">> @yield('page-title')</span></h2>
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>