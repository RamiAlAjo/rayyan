<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProjectsCategoriesController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = ProjectsCategory::latest()->paginate(10);
        return view('admin.projects.project_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.projects.project_categories.create');
    }

    /**
     * Store a newly created category in storage.
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
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar', 'status'
        ]);

        $data['slug'] = Str::slug($request->name_en) . '-' . Str::random(5);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/projects_categories', 'public');
        }

        ProjectsCategory::create($data);

        return redirect()->route('admin.projects_categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(ProjectsCategory $projectsCategory)
    {
        return view('admin.projects.project_categories.edit', ['category' => $projectsCategory]);
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, ProjectsCategory $projectsCategory)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar', 'status'
        ]);

        // Update slug if name_en changed
        if ($request->name_en !== $projectsCategory->name_en) {
            $data['slug'] = Str::slug($request->name_en) . '-' . Str::random(5);
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($projectsCategory->image && \Storage::disk('public')->exists($projectsCategory->image)) {
                \Storage::disk('public')->delete($projectsCategory->image);
            }
            $data['image'] = $request->file('image')->store('uploads/projects_categories', 'public');
        }

        $projectsCategory->update($data);

        return redirect()->route('admin.projects_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(ProjectsCategory $projectsCategory)
    {
        if ($projectsCategory->image && \Storage::disk('public')->exists($projectsCategory->image)) {
            \Storage::disk('public')->delete($projectsCategory->image);
        }

        $projectsCategory->delete();

        return redirect()->route('admin.projects_categories.index')->with('success', 'Category deleted successfully.');
    }
}
