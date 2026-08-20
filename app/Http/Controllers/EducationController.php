<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display all education records.
     */
    public function index()
    {
        $educations = Education::all();

        return view('admin.education.index', compact('educations'));
    }

    /**
     * Show the form for creating education.
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a new education record.
     */
    public function store(Request $request)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Education::create([
            'degree' => $request->degree,
            'institution' => $request->institution,
            'course' => $request->course,
            'period' => $request->period,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education added successfully.');
    }

    /**
     * Show the form for editing education.
     */
    public function edit(string $id)
    {
        $education = Education::findOrFail($id);

        return view('admin.education.edit', compact('education'));
    }

    /**
     * Update education.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $education = Education::findOrFail($id);

        $education->update([
            'degree' => $request->degree,
            'institution' => $request->institution,
            'course' => $request->course,
            'period' => $request->period,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education updated successfully.');
    }

    /**
     * Delete education.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);

        $education->delete();

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education deleted successfully.');
    }
}