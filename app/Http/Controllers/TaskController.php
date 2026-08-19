<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = auth()->user()->allTasksCreated;
        return view('tasks.index', compact('tasks'));
    }

    public function myTasks(){
        $tasks = auth()->user()->assignedTasks;
        $overdueTasks = $tasks->where('due_date', '<', Carbon::today())
                          ->where('status', '!=', 'completed')
                          ->count();

        $upcomingTasks = $tasks->where('due_date', '>=', Carbon::today())
                           ->where('status', '!=', 'completed')
                           ->count();

        return view('tasks.mytasks', compact('tasks', 'overdueTasks', 'upcomingTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $admin_id = auth()->user()->id;
        $users = auth()->user()->createdUsers;
        $projects = auth()->user()->projects;
        return view('tasks.create', compact('users', 'projects', 'admin_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'assigned_to' => 'nullable|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'project_id' => $request->project_id,
            'assigned_to' => $request->assigned_to,
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
