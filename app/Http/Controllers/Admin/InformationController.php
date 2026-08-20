<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function edit()
    {
        $information = \App\Models\Information::firstOrCreate([
            'id' => 1
        ], [
            'name' => 'Dinesh Khatri',
            'title' => 'PHP & Laravel Developer',
            'hero_description' => 'I am a student passionate about programming, web development and building useful applications. I enjoy creating modern and user-friendly web applications.',
            'about_description' => "My name is Dinesh Khatri. I am a student interested in software development and web technologies.\n\nI enjoy learning programming languages, developing web applications and working on projects that help me improve my technical skills.\n\nCurrently, I am developing my skills in PHP, Laravel, Java, Python, HTML, CSS, JavaScript and MySQL.",
            'github_url' => 'https://github.com/',
            'linkedin_url' => 'https://www.linkedin.com/',
            'email' => 'your-email@example.com',
        ]);

        return view('admin.information.edit', compact('information'));
    }

    public function update(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'about_description' => 'nullable|string',
            'github_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $information = \App\Models\Information::first();
        if ($information) {
            $information->update($request->all());
        }

        return redirect()->route('admin.information.edit')->with('success', 'Information updated successfully.');
    }
}
