<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\UserTask;

class File extends Controller
{
    public function store(Request $request)
    {
        $task = $request->task_id;
        $user = auth()->user()->id;

        // Get the uploaded file
        $uploadedFile = $request->file('file');

        // Store the file using the Storage facade
        $filePath = Storage::putFile('uploads', $uploadedFile, 'public');

        // Update the UserTask record only if 'file' is currently null
        UserTask::whereIn('task_id', $task)
            ->where('user_id', $user)
            ->whereNull('file')
            ->update(['file' => $filePath]);

        $project = $request->input('id_project');

        return redirect("/projects/$project/tasks");
    }

}
