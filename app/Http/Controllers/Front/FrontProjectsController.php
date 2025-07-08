<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;

class FrontProjectsController extends Controller
{
    public function index()
    {
        // Fetch only active projects
        $projects = Project::where('status', 1)->latest()->get();

        return view('front.projects', compact('projects'));
    }
}
