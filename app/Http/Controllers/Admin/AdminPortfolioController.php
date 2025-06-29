<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPortfolioController extends Controller
{
    /**
     * Display a listing of the portfolio.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created portfolio in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'portfolio_name_en' => 'required|string|max:255',
            'portfolio_name_ar' => 'required|string|max:255',
            'resume' => 'nullable|file|mimes:pdf|max:10240', // Validate resume (PDF only, max 10MB)
        ]);

        // Create a new portfolio entry
        $portfolio = new Portfolio();
        $portfolio->portfolio_name_en = $request->portfolio_name_en;
        $portfolio->portfolio_name_ar = $request->portfolio_name_ar;

        // Handle resume file upload if provided
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('portfolios/resumes', 'public');
            $portfolio->resume = $resumePath;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')->with('status-success', 'Portfolio added successfully!');
    }

    /**
     * Show the form for editing the specified portfolio.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified portfolio in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        // Validate the incoming request data
        $request->validate([
            'portfolio_name_en' => 'required|string|max:255',
            'portfolio_name_ar' => 'required|string|max:255',
            'resume' => 'nullable|file|mimes:pdf|max:10240', // Validate resume (PDF only, max 10MB)
        ]);

        // Update portfolio details
        $portfolio->portfolio_name_en = $request->portfolio_name_en;
        $portfolio->portfolio_name_ar = $request->portfolio_name_ar;

        // Handle resume file upload if provided
        if ($request->hasFile('resume')) {
            // Delete the old resume if it exists
            if ($portfolio->resume) {
                \Storage::delete('public/' . $portfolio->resume);
            }

            // Store the new resume
            $resumePath = $request->file('resume')->store('portfolios/resumes', 'public');
            $portfolio->resume = $resumePath;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')->with('status-success', 'Portfolio updated successfully!');
    }

    /**
     * Remove the specified portfolio from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete the portfolio's resume file if exists
        if ($portfolio->resume) {
            \Storage::delete('public/' . $portfolio->resume);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('status-success', 'Portfolio deleted successfully!');
    }
}
