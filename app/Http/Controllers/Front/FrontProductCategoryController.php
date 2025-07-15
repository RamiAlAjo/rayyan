<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;

class FrontProductCategoryController extends Controller
{
    public function index()
    {
        // Fetch only active product categories, ordered latest first
        $categories = ProductCategory::where('status', 'active')->latest()->get();

        // Pass them to the Blade view
        return view('front.Product_Categories', compact('categories'));
    }

    public function show(ProductCategory $product_category)
    {
        // OLD: Directly show products
        // $products = Product::where('category_id', $product_category->id)->where('status', 'active')->latest()->get();

        // NEW: Show subcategories under the selected category
        $subcategories = $product_category->subcategories()->where('status', 'active')->get();

        return view('front.product_subcategories', [
            'subcategories' => $subcategories,
            'categoryName' => $product_category->name_en,
        ]);
    }
}
