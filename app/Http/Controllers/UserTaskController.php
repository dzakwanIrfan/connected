<?php

namespace App\Http\Controllers;

use App\Models\UserTask;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\StoreUserTaskRequest;
use App\Http\Requests\UpdateUserTaskRequest;
use Illuminate\Http\Request;

class UserTaskController extends Controller
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
    public function create(Request $request)
    {
        return view('userTasks.create',[
            'task' => Task::where('id', $request->task)->first(),
            'users' => User::where('role', '<>', 'owner')->get(),
            'projects' => Project::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
        $task = Task::find($request->task_id);

        // Get an array of selected user IDs
        $selectedUsers = $request->input('user_id', []);

        // Attach selected users to the task
        $task->users()->syncWithoutDetaching($selectedUsers);

        $id = $request->input('id_project');

        return redirect("/projects/$id/tasks");
    }

    /**
     * Display the specified resource.
     */
    public function show(UserTask $userTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserTask $userTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserTaskRequest $request, UserTask $userTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserTask $userTask)
    {
        //
    }
}
