<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; // Import the File facade

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
            'portfolio_name_en' => 'required|string|max:255',
            'portfolio_name_ar' => 'required|string|max:255',
            'resume' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $portfolio = new Portfolio();
        $portfolio->portfolio_name_en = $request->portfolio_name_en;
        $portfolio->portfolio_name_ar = $request->portfolio_name_ar;

        if ($request->hasFile('resume')) {
            // Manual file handling for resume
            $resume = $request->file('resume');
            $resumeName = time() . '_' . $resume->getClientOriginalName(); // Custom name for the resume
            $resumePath = public_path('uploads/portfolios/resumes'); // Folder where the resume will be stored
            $resume->move($resumePath, $resumeName); // Move the file
            $portfolio->resume_path = 'uploads/portfolios/resumes/' . $resumeName; // Save the relative path
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
            'portfolio_name_en' => 'required|string|max:255',
            'portfolio_name_ar' => 'required|string|max:255',
            'resume' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $portfolio->portfolio_name_en = $request->portfolio_name_en;
        $portfolio->portfolio_name_ar = $request->portfolio_name_ar;

        if ($request->hasFile('resume')) {
            // Delete the old resume if exists
            if ($portfolio->resume_path && File::exists(public_path($portfolio->resume_path))) {
                File::delete(public_path($portfolio->resume_path));
            }

            // Handle new resume upload
            $resume = $request->file('resume');
            $resumeName = time() . '_' . $resume->getClientOriginalName(); // Custom name for the resume
            $resumePath = public_path('uploads/portfolios/resumes'); // Folder where the resume will be stored
            $resume->move($resumePath, $resumeName); // Move the file
            $portfolio->resume_path = 'uploads/portfolios/resumes/' . $resumeName; // Save the relative path
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')->with('status-success', 'Portfolio updated successfully!');
    }

    // Delete a portfolio
    public function destroy(Portfolio $portfolio)
    {
        // Delete the resume if it exists
        if ($portfolio->resume_path && File::exists(public_path($portfolio->resume_path))) {
            File::delete(public_path($portfolio->resume_path));
        }

        // Delete the portfolio record
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('status-success', 'Portfolio deleted successfully!');
    }
}
