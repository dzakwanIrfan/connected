<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTask;

class File extends Controller
{
    public function store(Request $request)
    {
        $task = $request->task_id;
        $user = auth()->user()->id;
        $file = $request->file;

        UserTask::whereIn('task_id', $task)->whereIn('user_id', $user)->create($file);

        $project = $request->input('id_project');

        return redirect("/projects/$project/tasks");
    }
}
