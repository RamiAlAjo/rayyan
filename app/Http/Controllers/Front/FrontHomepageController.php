<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Stat;  // Import Stat model

class FrontHomepageController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'active')->get();
        $features = Feature::where('status', 'active')->get();
        $aboutUs = AboutUs::first();
        $products = Product::where('status', 'active')->get();
        $stats = Stat::all();  // Get all stats

        return view('front.homepage', compact('categories', 'features', 'aboutUs', 'products', 'stats'));
    }
}
