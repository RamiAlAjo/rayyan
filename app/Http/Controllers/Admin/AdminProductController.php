<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // Import the File facade

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
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:5120', // 5MB max
            'category_id' => 'required|exists:products_categories,id',
            'subcategory_id' => 'nullable|exists:products_subcategories,id',
            'slug' => 'required|string|unique:products,slug',
            'status' => 'required|in:active,inactive,pending',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom name for the image
            $imagePath = public_path('uploads/products/images'); // Folder where the image will be stored
            $image->move($imagePath, $imageName); // Move the file
            $validated['image'] = 'uploads/products/images/' . $imageName; // Save the relative path
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('status-success', 'Product created successfully!');
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
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'category_id' => 'required|exists:products_categories,id',
            'subcategory_id' => 'nullable|exists:products_subcategories,id',
            'slug' => 'required|string|unique:products,slug,' . $product->id,
            'status' => 'required|in:active,inactive,pending',
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom name for the image
            $imagePath = public_path('uploads/products/images'); // Folder where the image will be stored
            $image->move($imagePath, $imageName); // Move the file
            $validated['image'] = 'uploads/products/images/' . $imageName; // Save the relative path
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('status-success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete the image if it exists
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('status-success', 'Product deleted successfully!');
    }
}
