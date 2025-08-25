<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
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

        if ($request->hasFile('image')) {
            // Handle the image upload manually
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom image name
            $imagePath = public_path('uploads/categories'); // Directory to store images
            $image->move($imagePath, $imageName); // Move the image to the directory

            // Store the relative path in the database
            $data['image'] = 'uploads/categories/' . $imageName;
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
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

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if (File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }

            // Handle the new image upload manually
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom image name
            $imagePath = public_path('uploads/categories'); // Directory to store images
            $image->move($imagePath, $imageName); // Move the file to the directory

            // Store the relative path in the database
            $data['image'] = 'uploads/categories/' . $imageName;
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Delete the image if it exists
        if ($category->image && File::exists(public_path($category->image))) {
            File::delete(public_path($category->image));
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
