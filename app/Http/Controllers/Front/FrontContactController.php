<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting; // <-- Import your model
use Illuminate\Http\Request;

class FrontContactController extends Controller
{
    public function index()
    {
        $settings = WebsiteSetting::first(); // Assuming there's one row
        return view('front.contact', compact('settings'));
    }
}
