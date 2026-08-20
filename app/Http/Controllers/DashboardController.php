<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $myTasks = auth()->user()->assignedTasks;
        if(auth()->user()->role == 'admin'){
            $users = auth()->user()->createdUsers;
            $projects = auth()->user()->projects;
            $allTasksCreated = auth()->user()->allTasksCreated;
            return view('dashboard.index', compact('users', 'projects', 'allTasksCreated', 'myTasks'));
        }else{
            $projectsUserBelongsTo = auth()->user()->teamProjects;
            $overdueTasks = $myTasks->where('due_date', '<' , Carbon::today())->where('status', '!==', 'completed')->count();
            return view('dashboard.index', compact('myTasks', 'projectsUserBelongsTo', 'overdueTasks'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
