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
use App\Models\WebsiteSetting;  // Make sure this matches the actual model
use App\Models\PhotosGallery;  // Add the PhotosGallery model

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
        $settings = WebsiteSetting::first();

        // Fetch active services (assuming the Service model exists)
        $services = Service::where('status', 'active')->get();

        // Fetch active photos from the gallery
        $photos = PhotosGallery::where('status', 'active')->get();

        // Return the view with all the necessary data, including photos
        return view('front.homepage', compact('categories', 'features', 'aboutUs', 'products', 'stats', 'projects', 'news', 'services', 'photos', 'settings'));
    }
}
