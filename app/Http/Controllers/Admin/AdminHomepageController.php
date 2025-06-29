<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomepageController extends Controller
{
    public function index()
    {
        // Get the logged-in user using Auth
        $user = Auth::user();

        // Pass the user to the view (you can add more data if needed)
        return view('admin.homepage', compact('user'));
    }
}
