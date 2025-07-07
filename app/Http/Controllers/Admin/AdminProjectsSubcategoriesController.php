<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectsCategory;
use App\Models\ProjectsSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProjectsSubcategoriesController extends Controller
{
    /**
     * Display a listing of subcategories.
     */
    public function index()
    {
        $subcategories = ProjectsSubcategory::with('category')->latest()->paginate(10);
        return view('admin.projects.project_subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new subcategory.
     */
    public function create()
    {
        $categories = ProjectsCategory::all();
        return view('admin.projects.project_subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created subcategory in storage.
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
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar', 'status', 'category_id'
        ]);

        $data['slug'] = Str::slug($request->name_en) . '-' . Str::random(5);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/projects_subcategories', 'public');
        }

        ProjectsSubcategory::create($data);

        return redirect()->route('admin.projects_subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    /**
     * Show the form for editing the specified subcategory.
     */
    public function edit(ProjectsSubcategory $projectsSubcategory)
    {
        $categories = ProjectsCategory::all();
        return view('admin.projects.project_subcategories.edit', [
            'subcategory' => $projectsSubcategory,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified subcategory in storage.
     */
    public function update(Request $request, ProjectsSubcategory $projectsSubcategory)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:projects_categories,id',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar', 'status', 'category_id'
        ]);

        if ($request->name_en !== $projectsSubcategory->name_en) {
            $data['slug'] = Str::slug($request->name_en) . '-' . Str::random(5);
        }

        if ($request->hasFile('image')) {
            if ($projectsSubcategory->image && \Storage::disk('public')->exists($projectsSubcategory->image)) {
                \Storage::disk('public')->delete($projectsSubcategory->image);
            }
            $data['image'] = $request->file('image')->store('uploads/projects_subcategories', 'public');
        }

        $projectsSubcategory->update($data);

        return redirect()->route('admin.projects_subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified subcategory from storage.
     */
    public function destroy(ProjectsSubcategory $projectsSubcategory)
    {
        if ($projectsSubcategory->image && \Storage::disk('public')->exists($projectsSubcategory->image)) {
            \Storage::disk('public')->delete($projectsSubcategory->image);
        }

        $projectsSubcategory->delete();

        return redirect()->route('admin.projects_subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
