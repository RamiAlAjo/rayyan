<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductCategoriesController extends Controller
{
    // Show list of product categories
    public function index()
    {
        $categories = ProductCategory::latest()->get();
        return view('admin.products.product_categories.index', compact('categories'));
    }

    // Show create form
    public function create()
    {
        return view('admin.products.product_categories.create');
    }

    // Store new category
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar', 'status'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        // Generate unique slug
        $data['slug'] = Str::slug($request->name_en);
        $slugExists = ProductCategory::where('slug', $data['slug'])->exists();
        if ($slugExists) {
            $data['slug'] .= '-' . uniqid();
        }

        ProductCategory::create($data);

        return redirect()->route('admin.product_categories.index')
                         ->with('status-success', 'Product category created successfully.');
    }

    // Show edit form
    public function edit(ProductCategory $product_category)
    {
        return view('admin.products.product_categories.edit', ['category' => $product_category]);
    }

    // Update category
    public function update(Request $request, ProductCategory $product_category)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $data = $request->only([
            'name_en', 'name_ar', 'description_en', 'description_ar', 'status'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product_category->image) {
                Storage::disk('public')->delete($product_category->image);
            }

            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        // Update slug if name_en changed
        if ($product_category->name_en !== $request->name_en) {
            $slug = Str::slug($request->name_en);
            if (ProductCategory::where('slug', $slug)->where('id', '!=', $product_category->id)->exists()) {
                $slug .= '-' . uniqid();
            }
            $data['slug'] = $slug;
        }

        $product_category->update($data);

        return redirect()->route('admin.product_categories.index')
                         ->with('status-success', 'Product category updated successfully.');
    }

    // Delete category
    public function destroy(ProductCategory $product_category)
    {
        if ($product_category->image) {
            Storage::disk('public')->delete($product_category->image);
        }

        $product_category->delete();

        return redirect()->route('admin.product_categories.index')
                         ->with('status-success', 'Product category deleted successfully.');
    }
}
