<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
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
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'github_url' => 'nullable|url|max:255',
        'technologies' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')
            ->store('projects', 'public');
    }

    Project::create($validated);

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $project = Project::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'github_url' => 'nullable|url|max:255',
        'technologies' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    /*
     * Check if a new image was uploaded.
     */
    if ($request->hasFile('image')) {

        /*
         * Delete the old image.
         */
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        /*
         * Store the new image.
         */
        $validated['image'] = $request->file('image')
            ->store('projects', 'public');
    }

    /*
     * Update the project.
     */
    $project->update($validated);

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $project = Project::findOrFail($id);

    // Delete the project image from storage
    if ($project->image) {
        Storage::disk('public')->delete($project->image);
    }

    // Delete the project from the database
    $project->delete();

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project deleted successfully!');
}
}