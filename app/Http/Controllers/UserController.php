<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserTask;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::all(),
            'projects' => Project::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        User::create($request->all());

        return redirect("/users");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('profil.index', [
            'user' => User::where('id', $user->id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('profil.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {   
        $validated = $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'image' => 'image|file|max:1024',
        ]);

        $data = $request->all();

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('image');
        }

        $validated['password'] = Hash::make($request->password);
        User::where('id', $user->id)->update($validated);
        if(auth()->user()->role === 'owner')
        {
            return redirect("/users");
        }else
        {
            return redirect("/users/$user->id");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        UserTask::destroy($user->id);
        User::destroy($user->id);
        return redirect('/users');
    }
}
