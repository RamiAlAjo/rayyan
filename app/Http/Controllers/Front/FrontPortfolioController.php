<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portfolio; // Make sure to import the Portfolio model
use Illuminate\Http\Request;

class FrontPortfolioController extends Controller
{
    public function index()
    {
        // Fetch the first portfolio or return null if not found
        $portfolio = Portfolio::first(); // Get the first portfolio; you could adjust this logic

        // If portfolio doesn't exist, return a default or error message
        if (!$portfolio) {
            return redirect()->route('home')->with('error', 'Portfolio not found.');
        }

        // Pass the portfolio data to the view
        return view('front.portfolio', compact('portfolio'));
    }
}
