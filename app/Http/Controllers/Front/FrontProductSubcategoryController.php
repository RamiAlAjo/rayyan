<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductSubcategory;
use App\Models\Product;

class FrontProductSubcategoryController extends Controller
{
    // Show all active subcategories (optional)
    public function index()
    {
        $subcategories = ProductSubcategory::where('status', 'active')->latest()->get();

        return view('front.product_subcategories', compact('subcategories'));
    }

    // Show products for a specific subcategory (by model binding)
    public function show(ProductSubcategory $product_subcategory)
    {
        $products = Product::where('subcategory_id', $product_subcategory->id)
            ->where('status', 'active')
            ->latest()
            ->get();

        return view('front.products', [
            'products' => $products,
            'categoryName' => $product_subcategory->name_en, // For page heading
        ]);
    }
}
