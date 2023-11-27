<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTask;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $task = $request->task_id;
        $user = auth()->user()->id;
        $file = $request->file('file'); // get the file from the request

        // validate and store the file
        $fileName = auth()->user()->name . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('files', $fileName);

        // find the UserTask and update the file column
        $userTask = UserTask::where('task_id', $task)->where('user_id', $user)->first();
        if ($userTask) {
            $userTask->file = $path;
            $userTask->save();
        }

        $project = $request->input('id_project');

        return redirect("/projects/$project/tasks");
    }
}
