<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display all skills.
     */
    public function index()
    {
        $skills = Skill::all();

        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new skill.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created skill.
     */
    public function store(Request $request)
    {
        $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'required|string',
]);

        Skill::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill added successfully.');
    }

    /**
     * Show a specific skill.
     */
    public function show(string $id)
    {
        $skill = Skill::findOrFail($id);

        return view('skills.show', compact('skill'));
    }

    /**
     * Show the form for editing a skill.
     */
    public function edit(string $id)
    {
        $skill = Skill::findOrFail($id);

        return view('skills.edit', compact('skill'));
    }

    /**
     * Update a skill.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $skill = Skill::findOrFail($id);

        $skill->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    /**
     * Delete a skill.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);

        $skill->delete();

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}