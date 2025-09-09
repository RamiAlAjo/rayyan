<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File; // For handling file uploads
use Illuminate\Support\Str; // For slug generation

class AdminNewsController extends Controller
{
    // Display a listing of the news
    public function index()
    {
        $news = News::all(); // Fetch all news items
        return view('admin.news.index', compact('news')); // Return the view with data
    }

    // Show the form for creating a new news item
    public function create()
    {
        return view('admin.news.create'); // Return a create view
    }

    // Store a newly created news item in storage
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:2055',
            'title_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);

        // Handle the image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Store the image in the public/uploads/news/ folder
            $imagePath = $image->move(public_path('uploads/news'), $image->getClientOriginalName()); // move file to public/uploads/news/
        }

        // Create the news record
        $news = News::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'image' => 'uploads/news/' . $image->getClientOriginalName(), // Save the relative path
            'slug' => Str::slug($request->title_en), // Generate slug from the English title
            'status' => $request->status ?? 'active',
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News item created successfully!');
    }

    // Show the form for editing the specified news item
    public function edit($id)
    {
        $news = News::findOrFail($id); // Find the news by ID
        return view('admin.news.edit', compact('news')); // Return the edit view with news data
    }

    // Update the specified news item in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_en' => 'required|string|max:2055',
            'title_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);

        $news = News::findOrFail($id); // Find the news by ID

        // Handle image update if present
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image)); // Delete the old image
            }

            $image = $request->file('image');
            $imagePath = $image->move(public_path('uploads/news'), $image->getClientOriginalName()); // move file to public/uploads/news/
            $news->image = 'uploads/news/' . $image->getClientOriginalName(); // Update the news image path
        }

        // Update the news record
        $news->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'slug' => Str::slug($request->title_en), // Regenerate slug
            'status' => $request->status ?? $news->status, // Keep the existing status if not updated
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News item updated successfully!');
    }

    // Remove the specified news item from storage
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Delete the image if it exists
        if ($news->image && file_exists(public_path($news->image))) {
            unlink(public_path($news->image)); // Delete the image file
        }

        $news->delete(); // Delete the news item

        return redirect()->route('admin.news.index')->with('success', 'News item deleted successfully!');
    }
}
