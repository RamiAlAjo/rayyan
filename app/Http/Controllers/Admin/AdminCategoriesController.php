<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; // For handling file uploads

class AdminCategoriesController extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created category
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);

        // Handle the image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Store the image under public/uploads/
            $imagePath = $image->move(public_path('uploads'), $image->getClientOriginalName()); // Move file to public/uploads/
        }

        // Create the category
        Category::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'image' => 'uploads/' . $image->getClientOriginalName(), // Save relative path for the image
            'status' => $request->status ?? 'active',
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    // Show the form for editing the specified category
    public function edit($id)
    {
        $category = Category::findOrFail($id); // Find the category by ID
        return view('admin.categories.edit', compact('category'));
    }

    // Update the specified category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::findOrFail($id);

        // Handle image update if present
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image)); // Delete the old image
            }

            // Save the new image
            $image = $request->file('image');
            $category->image = 'uploads/' . $image->getClientOriginalName(); // Save relative path for the new image
            $image->move(public_path('uploads'), $image->getClientOriginalName()); // Move the new file to public/uploads/
        }

        // Update category data
        $category->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'status' => $request->status ?? $category->status,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete the specified category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete the image if it exists
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image)); // Delete the image file
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}
