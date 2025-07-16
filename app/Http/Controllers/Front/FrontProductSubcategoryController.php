<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductSubcategory;
use App\Models\Product;

class FrontProductSubcategoryController extends Controller
{
    // List all active subcategories (if needed)
    public function index()
    {
        $subcategories = ProductSubcategory::where('status', 'active')->latest()->get();
        return view('front.product_subcategories', compact('subcategories'));
    }

    // Show products for a specific subcategory
    public function show(ProductSubcategory $product_subcategory)
    {
        // Get only active products in the subcategory, paginated 6 per page
        $products = Product::where('subcategory_id', $product_subcategory->id)
            ->where('status', 'active')
            ->latest()
            ->paginate(6); // Display 6 products per page

        return view('front.products', [
            'products' => $products,
            'categoryName' => $product_subcategory->name_en,
        ]);
    }
}
