<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;

class AdminController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();

        $skillCount = Skill::count();

        return view('admin.dashboard', compact(
            'projectCount',
            'skillCount'
        ));
    }
}