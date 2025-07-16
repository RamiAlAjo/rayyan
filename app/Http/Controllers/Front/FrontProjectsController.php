<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;

class FrontProjectsController extends Controller
{
    // Show all active projects
    public function index()
    {
        $projects = Project::where('status', 1)->latest()->get();

        return view('front.projects', compact('projects'));
    }

    // Show a specific project and 3 other recent projects
    public function show(Project $project)
    {
        // Fetch 3 other projects, excluding the current one
        $otherProjects = Project::where('id', '!=', $project->id)
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get();

        return view('front.projects_show', compact('project', 'otherProjects'));
    }
}
