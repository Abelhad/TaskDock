<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="dashContainer">
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('oldtaskdock-logo.png') }}" alt="TaskDock">
            </div>
            <div>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="">Projects</a>
                <a href="">Tasks</a>
            </div>
        </div>
        <div class="rightSide">
            <div class="header">
                <button>logout</button>
            </div>
            <div class="content">
                <h2>TaskDock > @yield('page-title')</h2>
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>