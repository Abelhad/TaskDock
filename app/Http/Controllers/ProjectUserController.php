<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        //
        $users = auth()->user()->createdUsers;
        return view('projectUser.create', compact('project', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        //
        $request->validate([
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
        ]);

        $project->members()->attach($request->users);

        return redirect()->back();     
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

    public function unassignUsers(Project $project){
        $assignedusers = $project->members;
        return view('projectUser.unassignUsers', compact('project', 'assignedusers'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Project $project)
    {
        //
        $request->validate([
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
        ]);
        $project->members()->detach($request->users);
        return redirect()->route('projects.index');
    }
}
