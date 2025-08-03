<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;

class FrontServicesController extends Controller
{
    // Method to fetch and display all active services
    public function index()
    {
        // Get only active services
        $services = Service::where('status', 'active')->get();

        // Pass services to the view
        return view('front.services', compact('services'));
    }


    public function show($slug)
{
    // Find the service by slug
    $service = Service::where('slug', $slug)->firstOrFail();

    // Get other active services (you can modify the query to fit your needs)
    // For example, if you want to get services that are not the current one:
    $otherServices = Service::where('status', 'active')
                            ->where('slug', '!=', $slug) // Exclude the current service
                            ->get();

    // Pass both the service and otherServices to the view
    return view('front.services_show', compact('service', 'otherServices'));
}

}
