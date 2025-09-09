<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // Import the File facade
use Illuminate\Support\Facades\Storage; // Use the Storage facade

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'subcategory')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::where('status', 'active')->get();
        $subcategories = ProductSubcategory::all(); // Add this line
        return view('admin.products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        // Validate input based on your migrations
        $validated = $request->validate([
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:50120', // 5MB max
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'status' => 'required',
            'slug' => 'nullable',
        ]);

        $product = new Product();

        $product->name_en = $request->name_en;
        $product->name_ar = $request->name_ar;
        $product->description_en = $request->description_en ?? null;
        $product->description_ar = $request->description_ar ?? null;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id ?? null;

        // Generate a unique slug if not provided
        $slug = $request['slug'] ?? str_replace(['/', ' '], '-', $product->name_en);

        $product->slug = $slug;

        // Handle image upload
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/images/'; // Updated path
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            // Check if the directory exists, if not, create it
            if (!File::exists(($uploadPath))) {
                File::makeDirectory(($uploadPath), 0775, true);
            }

            // Move the file to the specified path
            $file->move(($uploadPath), $fileName);
            $product->image = $uploadPath . $fileName; // Save the relative path
        }

        if ($product->save()) {
            return to_route('admin.products.index')->with('status-success', 'Product Created Successfully');
        }

        return to_route('admin.products.index')->with('status-error', 'Product Creation Failed');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::where('status', 'active')->get();
        $subcategories = ProductSubcategory::where('category_id', $product->category_id)->get();
        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:50120', // 5MB max
            'category_id' => 'nullable',
            'subcategory_id' => 'nullable',
            'slug' => 'required',
            'status' => 'required',
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image && File::exists(($product->image))) {
                File::delete(($product->image));
            }

            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom name for the image

            // Store the image in 'uploads/products/images/'
            $imagePath = 'uploads/products/images/' . $imageName;
            $image->move(('uploads/products/images'), $imageName); // Move the image to the directory

            $validated['image'] = $imagePath; // Save the relative path
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('status-success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete the image if it exists
        if ($product->image && File::exists(($product->image))) {
            File::delete(($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('status-success', 'Product deleted successfully!');
    }
}
