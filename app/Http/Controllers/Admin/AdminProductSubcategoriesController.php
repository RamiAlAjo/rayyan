<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSubcategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductSubcategoriesController extends Controller
{
    public function index()
    {
        $subcategories = ProductSubcategory::with('category')->latest()->get();
        return view('admin.products.product_subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.product_subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive,pending',
            'category_id' => 'required|exists:products_categories,id',
        ]);

        $data = $request->only([
            'name_en',
            'name_ar',
            'description_en',
            'description_ar',
            'status',
            'category_id',
        ]);

        $data['slug'] = Str::slug($request->name_en);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_subcategories', 'public');
        }

        ProductSubcategory::create($data);

        return redirect()->route('admin.product_subcategories.index')
            ->with('status-success', 'Product subcategory created successfully.');
    }

    public function edit(ProductSubcategory $product_subcategory)
    {
        $categories = ProductCategory::all();
        return view('admin.products.product_subcategories.edit', [
            'subcategory' => $product_subcategory,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, ProductSubcategory $product_subcategory)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:active,inactive,pending',
            'category_id' => 'required|exists:products_categories,id',
        ]);

        $data = $request->only([
            'name_en',
            'name_ar',
            'description_en',
            'description_ar',
            'status',
            'category_id',
        ]);

        $data['slug'] = Str::slug($request->name_en);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product_subcategory->image) {
                Storage::disk('public')->delete($product_subcategory->image);
            }
            $data['image'] = $request->file('image')->store('product_subcategories', 'public');
        }

        $product_subcategory->update($data);

        return redirect()->route('admin.product_subcategories.index')
            ->with('status-success', 'Product subcategory updated successfully.');
    }

    public function destroy(ProductSubcategory $product_subcategory)
    {
        if ($product_subcategory->image) {
            Storage::disk('public')->delete($product_subcategory->image);
        }

        $product_subcategory->delete();

        return redirect()->route('admin.product_subcategories.index')
            ->with('status-success', 'Product subcategory deleted successfully.');
    }
}
