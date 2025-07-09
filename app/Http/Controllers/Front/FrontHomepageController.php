<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Stat;
use App\Models\Project;
use App\Models\News;
use App\Models\Service;

class FrontHomepageController extends Controller
{
    public function index()
    {
        // Fetch active categories, features, products, stats, services, projects, and news
        $categories = Category::where('status', 'active')->get();
        $features = Feature::where('status', 'active')->get();
        $aboutUs = AboutUs::first();
        $products = Product::where('status', 'active')->paginate(6);
        $stats = Stat::all();
        $projects = Project::where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        $news = News::where('status', 'active')->orderBy('created_at', 'desc')->limit(6)->get();

        // Fetch active services (assuming the Service model exists)
        $services = Service::where('status', 'active')->get();

        // Return the view with all the necessary data, including services
        return view('front.homepage', compact('categories', 'features', 'aboutUs', 'products', 'stats', 'projects', 'news', 'services'));
    }
}
