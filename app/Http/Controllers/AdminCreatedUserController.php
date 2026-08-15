<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class AdminCreatedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = auth()->user()->createdUsers;
        $usersWithProjects = 0;
        $usersWithNoProjects = 0;
        foreach($users as $user){
            if($user->teamProjects->isEmpty()){
                    $usersWithNoProjects++ ;
            }
            else{
                    $usersWithProjects++ ;
            }
        }


        return view('adminspace.index', compact('users', 'usersWithNoProjects', 'usersWithProjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('adminspace.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::Default()]
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'created_by' => auth()->id(),
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('adminspace.create');
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
