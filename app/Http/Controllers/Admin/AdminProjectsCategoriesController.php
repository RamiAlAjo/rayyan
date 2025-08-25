<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // Importing File facade for manual handling

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

        // Generate slug with random unique part
        $data['slug'] = Str::slug($request->name_en) . '-' . Str::random(5);

        // Handle image upload manually
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique image name
            $imagePath = public_path('uploads/projects_categories/images'); // Folder for storing images
            $image->move($imagePath, $imageName); // Move the file manually
            $data['image'] = 'uploads/projects_categories/images/' . $imageName; // Store relative path
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

        // Handle image update manually
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($projectsCategory->image && File::exists(public_path($projectsCategory->image))) {
                File::delete(public_path($projectsCategory->image)); // Delete the old image file
            }

            // Upload the new image manually
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique image name
            $imagePath = public_path('uploads/projects_categories/images'); // Folder for storing images
            $image->move($imagePath, $imageName); // Move the file manually
            $data['image'] = 'uploads/projects_categories/images/' . $imageName; // Store relative path
        }

        $projectsCategory->update($data);

        return redirect()->route('admin.projects_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(ProjectsCategory $projectsCategory)
    {
        // Delete the image if it exists
        if ($projectsCategory->image && File::exists(public_path($projectsCategory->image))) {
            File::delete(public_path($projectsCategory->image)); // Delete the old image file
        }

        $projectsCategory->delete();

        return redirect()->route('admin.projects_categories.index')->with('success', 'Category deleted successfully.');
    }
}
