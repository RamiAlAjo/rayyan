<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs; // Don't forget to import the model

class FrontAboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first(); // Assumes only one record
        return view('front.about', compact('aboutUs'));
    }
}
