<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class FrontProductController extends Controller
{
    public function index()
    {
        // Fetch only active products, you can customize the order
        $products = Product::where('status', 'active')->latest()->get();

        // Pass them to the Blade view
        return view('front.products', compact('products'));
    }
}
