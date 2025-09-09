<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectsCategory;
use App\Models\ProjectsSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // for file deletion

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
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:20048',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:projects_categories,id',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar', 'status', 'category_id'
        ]);

        // Generate a unique slug for the subcategory
        $data['slug'] = $this->generateSlug($request->name_en);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
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
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:20048',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:projects_categories,id',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar', 'status', 'category_id'
        ]);

        // Generate a new unique slug if the name has changed
        if ($request->name_en !== $projectsSubcategory->name_en) {
            $data['slug'] = $this->generateSlug($request->name_en);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $this->deleteImage($projectsSubcategory); // Delete the old image
            $data['image'] = $this->uploadImage($request->file('image')); // Upload new image
        }

        $projectsSubcategory->update($data);

        return redirect()->route('admin.projects_subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified subcategory from storage.
     */
    public function destroy(ProjectsSubcategory $projectsSubcategory)
    {
        $this->deleteImage($projectsSubcategory); // Delete the image before deleting the subcategory
        $projectsSubcategory->delete();

        return redirect()->route('admin.projects_subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }

    /**
     * Helper function to generate unique slug.
     */
    private function generateSlug($name)
    {
        $slug = Str::slug($name);
        $slugExists = ProjectsSubcategory::where('slug', $slug)->exists();

        if ($slugExists) {
            $slug .= '-' . Str::random(5); // Add random string if slug exists
        }

        return $slug;
    }

    /**
     * Helper function to handle image upload.
     */
    private function uploadImage($image)
    {
        // Generate unique name for the image
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Define the path in public folder
        $imagePath = ('uploads/projects_subcategories');

        // Check if folder exists, if not, create it
        if (!File::exists($imagePath)) {
            File::makeDirectory($imagePath, 0775, true); // Create folder with appropriate permissions
        }

        // Move the image to the public folder
        $image->move($imagePath, $imageName);

        // Return the relative path to store in the database
        return 'uploads/projects_subcategories/' . $imageName;
    }

    /**
     * Helper function to delete the image.
     */
    private function deleteImage($projectsSubcategory)
    {
        if ($projectsSubcategory->image && File::exists(($projectsSubcategory->image))) {
            File::delete(($projectsSubcategory->image)); // Delete old image
        }
    }
}
