<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectsCategory;
use App\Models\ProjectsSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // For file deletion

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
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:20048',
            'status' => 'required|boolean',
            'category_id' => 'nullable|exists:projects_categories,id',
            'subcategory_id' => 'nullable|exists:projects_subcategories,id',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar',
            'status', 'category_id', 'subcategory_id'
        ]);

        // Slug generation with a unique check
        $slug = Str::slug($request->name_en);
        $existingSlug = Project::where('slug', $slug)->exists();
        if ($existingSlug) {
            $slug .= '-' . Str::random(5);  // Append random string to ensure uniqueness
        }
        $data['slug'] = $slug;

        // Handle image upload manually
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique name
            $imagePath = ('uploads/projects'); // Storage folder

            // Check if folder exists, if not create it
            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0775, true); // Create folder with appropriate permissions
            }

            // Move the image to the public folder
            $image->move($imagePath, $imageName); // Move the file manually
            $data['image'] = 'uploads/projects/' . $imageName; // Save relative path
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
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:20048',
            'status' => 'required|boolean',
            'category_id' => 'nullable|exists:projects_categories,id',
            'subcategory_id' => 'nullable|exists:projects_subcategories,id',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar',
            'status', 'category_id', 'subcategory_id'
        ]);

        // Update slug if name_en changed
        if ($request->name_en !== $project->name_en) {
            $slug = Str::slug($request->name_en);
            $existingSlug = Project::where('slug', $slug)->where('id', '!=', $project->id)->exists();
            if ($existingSlug) {
                $slug .= '-' . Str::random(5);  // Append random string to ensure uniqueness
            }
            $data['slug'] = $slug;
        }

        // Handle image upload manually
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && File::exists(($project->image))) {
                File::delete(($project->image)); // Delete old file
            }

            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique image name
            $imagePath = ('uploads/projects'); // Folder to store the image

            // Check if folder exists, if not create it
            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0775, true); // Create folder with appropriate permissions
            }

            // Move image to the folder
            $image->move($imagePath, $imageName); // Move image to the public folder
            $data['image'] = 'uploads/projects/' . $imageName; // Save relative path
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        // Delete image if exists
        if ($project->image && File::exists(($project->image))) {
            File::delete(($project->image)); // Delete old image
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
