<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProjectsSubcategory;
use App\Models\Project;

class FrontProjectSubcategoryController extends Controller
{
    // Optional: List all active subcategories
    public function index()
    {
        $subcategories = ProjectsSubcategory::where('status', 1)
            ->latest()
            ->get();

        return view('front.project_subcategories', compact('subcategories'));
    }

    // Show projects for a specific subcategory
    public function show(ProjectsSubcategory $projects_subcategory)
    {
        $projects = Project::where('subcategory_id', $projects_subcategory->id)
            ->where('status', 1)
            ->latest()
            ->paginate(6); // Show 6 projects per page

        return view('front.projects', [
            'projects' => $projects,
            'categoryName' => $projects_subcategory->name_en,
        ]);
    }
}
