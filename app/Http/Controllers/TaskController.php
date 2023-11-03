<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\UserTask;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function projectTasks(Project $project)
    {
        if(auth()->user()->role === 'owner'){
            $tasks = Task::where('id_project', $project->id)->get();
        }else{
            $userTask = UserTask::where('user_id', auth()->user()->id)->get();
            $taskIds = $userTask->pluck('task_id');
            $tasks = Task::where('id_project', $project->id)->whereIn('id', $taskIds)->get();
        }
        $taskUsers = [];
        // Ambil tugas-tugas yang terkait dengan proyek ini
        if(auth()->user()->role === 'owner'){
            foreach ($tasks as $task) {
                $userTasks = UserTask::where('task_id', $task->id)->get();
                $users = User::whereIn('id', $userTasks->pluck('user_id'))->get();
        
                $taskUsers[$task->id] = $users;
            }
        }else{
            foreach ($tasks as $task) {
                $userTasks = UserTask::where('task_id', $task->id)->get();
                $users = User::whereIn('id', $userTasks->pluck('user_id'))->get();
        
                $taskUsers[$task->id] = $users;
            }
        }

        return view('tasks.index', [
            'tasks' => $tasks,
            'project' => $project,
            'taskUsers' => $taskUsers
        ]);
    }


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
        return view('tasks.create', [
            'users' => User::all(),
            'id_project' => $request->task
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_task' => 'required|max:255',
            'deskripsi_task' => 'required|max:255',
            'status' => 'required|max:255',
            'mulai' => 'required',
            'selesai' => 'required'
        ]);

        $id = $request->id_project;
        $validatedData['id_project'] = $id;

        Task::create($validatedData);

        return redirect("/projects/$id/tasks");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $rules = [
            'nama_task' => 'required|max:255',
            'deskripsi_task' => 'required|max:255',
            'status' => 'required|max:255',
            'mulai' => 'required',
            'selesai' => 'required'
        ];
        
        $validatedData = $request->validate($rules);
        
        if($request->file('file')){
            if($request->oldFile){
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('post-file');
        }

        $id = $request->id_project;
        $validatedData['id_project'] = $id;

        Task::where('id', $task->id)->update($validatedData);

        return redirect("/projects/$id/tasks");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->id);
        return redirect("/projects/$task->id_project/tasks");
    }
}
