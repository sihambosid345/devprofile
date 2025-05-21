<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects;
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url',
        ]);

        Auth::user()->projects()->create($request->all());

        return redirect()->route('projects.index')->with('success', 'Projet ajouté.');
    }

    public function edit(Project $project)
    {
        if ($project->user_id !== auth()->id()) {
    abort(403);
}
        return view('projects.edit', compact('project'));
    }

   public function update(Request $request, Project $project)
{
    if ($project->user_id !== auth()->id()) {
        abort(403);
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'link' => 'nullable|url',
    ]);

    $project->update($request->only('title', 'description', 'link'));

    return redirect()->route('profile.edit')->with('success', 'Projet mis à jour.');
}

    public function destroy(Project $project)
{
    if ($project->user_id !== auth()->id()) {
        abort(403);
    }

    $project->delete();

    return redirect()->route('profile.edit')->with('success', 'Projet supprimé.');
}


    public function storeFromProfile(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'link' => 'nullable|url'
    ]);

    auth()->user()->projects()->create($request->only('title', 'description', 'link'));

    return redirect()->route('profile.edit')->with('success', 'Projet ajouté.');
}
}