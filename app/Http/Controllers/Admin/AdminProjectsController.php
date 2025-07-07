<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectsCategory;
use App\Models\ProjectsSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Project::with(['category', 'subcategory'])->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        $categories = ProjectsCategory::all();
        $subcategories = ProjectsSubcategory::all();
        return view('admin.projects.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:projects_categories,id',
            'subcategory_id' => 'nullable|exists:projects_subcategories,id',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar',
            'status', 'category_id', 'subcategory_id'
        ]);

        // Slug generation
        $data['slug'] = Str::slug($request->name_en) . '-' . Str::random(5);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/projects', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        $categories = ProjectsCategory::all();
        $subcategories = ProjectsSubcategory::all();
        return view('admin.projects.edit', compact('project', 'categories', 'subcategories'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:projects_categories,id',
            'subcategory_id' => 'nullable|exists:projects_subcategories,id',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar',
            'status', 'category_id', 'subcategory_id'
        ]);

        // Update slug if name_en changed
        if ($request->name_en !== $project->name_en) {
            $data['slug'] = Str::slug($request->name_en) . '-' . Str::random(5);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image && \Storage::disk('public')->exists($project->image)) {
                \Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('uploads/projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image && \Storage::disk('public')->exists($project->image)) {
            \Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
