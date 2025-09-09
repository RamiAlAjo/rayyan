<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class AdminPortfolioController extends Controller
{
    // Display all portfolios
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    // Show form to create a new portfolio
    public function create()
    {
        return view('admin.portfolio.create');
    }

    // Store new portfolio
    public function store(Request $request)
{
    $request->validate([
        'portfolio_name_en' => 'required|string|max:2055',
        'portfolio_name_ar' => 'required|string|max:2055',
        'resume' => 'nullable|file|mimes:pdf|max:20240',
    ]);

    $portfolio = new Portfolio();
    $portfolio->portfolio_name_en = $request->portfolio_name_en;
    $portfolio->portfolio_name_ar = $request->portfolio_name_ar;

    if ($request->hasFile('resume')) {
        $resume = $request->file('resume');
        $resumeName = time() . '_' . $resume->getClientOriginalName();

        $destination = public_path('portfolios/resumes');
        $resume->move($destination, $resumeName);

        $portfolio->resume_path = 'portfolios/resumes/' . $resumeName;
    }

    $portfolio->save();

    return redirect()->route('admin.portfolio.index')->with('status-success', 'Portfolio added successfully!');
}

    // Show form to edit existing portfolio
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    // Update existing portfolio
   public function update(Request $request, Portfolio $portfolio)
{
    $request->validate([
        'portfolio_name_en' => 'required|string|max:2055',
        'portfolio_name_ar' => 'required|string|max:2055',
        'resume' => 'nullable|file|mimes:pdf|max:20240',
    ]);

    $portfolio->portfolio_name_en = $request->portfolio_name_en;
    $portfolio->portfolio_name_ar = $request->portfolio_name_ar;

    if ($request->hasFile('resume')) {
        // Delete old resume manually
        if ($portfolio->resume_path && file_exists(public_path($portfolio->resume_path))) {
            unlink(public_path($portfolio->resume_path));
        }

        $resume = $request->file('resume');
        $resumeName = time() . '_' . $resume->getClientOriginalName();

        $destination = public_path('portfolios/resumes');
        $resume->move($destination, $resumeName);

        $portfolio->resume_path = 'portfolios/resumes/' . $resumeName;
    }

    $portfolio->save();

    return redirect()->route('admin.portfolio.index')->with('status-success', 'Portfolio updated successfully!');
}


    // Delete a portfolio
   public function destroy(Portfolio $portfolio)
{
    if ($portfolio->resume_path && file_exists(public_path($portfolio->resume_path))) {
        unlink(public_path($portfolio->resume_path));
    }

    $portfolio->delete();

    return redirect()->route('admin.portfolio.index')->with('status-success', 'Portfolio deleted successfully!');
}

}
