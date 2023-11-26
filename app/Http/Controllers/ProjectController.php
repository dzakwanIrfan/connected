<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Suggestion;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
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
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_project' => 'required|max:255',
            'deskripsi_project' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'mulai' => 'required',
            'selesai' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $project = Project::create($validatedData);

        // Membuat tugas terkait dengan proyek yang baru dibuat
        $taskData = [
            'id_project' => $project->id,
            'nama_task' => 'Nama Tugas Default',
            'deskripsi_task' => 'Deskripsi Tugas Default',
            'status' => 'Belum Mulai Dikerjakan',
            'file' => 'Nama File Default',
            'mulai' => $project->mulai,
            'selesai' => $project->selesai,
        ];

        $suggestion = [
            'project_id' => $project->id,
            'user_id' => '1',
            'suggestion' => 'Contoh saran'
        ];

        Suggestion::create($suggestion);
        Task::create($taskData);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $rules = [
            'nama_project' => 'required|max:255',
            'deskripsi_project' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'mulai' => 'required',
            'selesai' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $project->update($validatedData);

        return redirect("/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        Project::destroy($project->id);
        return redirect('/dashboard');
    }
}
