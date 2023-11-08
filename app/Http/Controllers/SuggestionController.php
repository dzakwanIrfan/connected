<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use App\Http\Requests\StoreSuggestionRequest;
use App\Http\Requests\UpdateSuggestionRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class SuggestionController extends Controller
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
        return view('suggestions.create', [
            'project' => $request->id_project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'project_id' => 'required',
            'user_id' => 'required',
            'suggestion' => 'required',
        ]);
        Suggestion::create($validate);

        return redirect("/projects/$request->project_id/tasks");
    }

    /**
     * Display the specified resource.
     */
    public function show(Suggestion $suggestion, Request $request)
    {
        $suggestions = Suggestion::where('project_id', $request->id_project)->get();
        return view('suggestions.index', [
            'suggestions' => $suggestions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuggestionRequest $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suggestion $suggestion)
    {
        //
    }
}
