<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    //use AuthorizesRequests; 
    public function index()
    {
        $skills = Auth::user()->skills;
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        Auth::user()->skills()->create($request->all());

        return redirect()->route('skills.index')->with('success', 'Compétence ajoutée.');
    }

    public function edit(Skill $skill)
    {
        $this->authorize('update', $skill);
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        if ($skill->user_id !== auth()->id()) {
            abort(403);
        }

        $skill->update($request->all());

        return redirect()->back()->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $this->authorize('delete', $skill);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Compétence supprimée.');
    }

    public function storeFromProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        auth()->user()->skills()->create($request->only('name'));

        return redirect()->route('profile.edit')->with('success', 'Compétence ajoutée.');
    }
}