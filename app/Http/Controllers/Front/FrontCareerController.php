<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;

use Illuminate\Http\Request;

class FrontCareerController extends Controller
{
    public function index()
    {
         $settings = WebsiteSetting::first(); // Assuming there's one row

        return view('front.careers', compact('settings'));
    }
}
