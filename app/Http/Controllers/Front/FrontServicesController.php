<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;

class FrontServicesController extends Controller
{
    public function index()
    {
        // Get only active services
        $services = Service::where('status', 'active')->get();

        return view('front.services', compact('services'));
    }
}
