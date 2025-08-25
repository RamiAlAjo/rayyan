<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Import File facade

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news item.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created news item in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'image' => 'nullable|image|max:5120', // max 5MB
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'slug' => 'required|string|max:255|unique:news,slug',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom image name
            $imagePath = public_path('uploads/news/images'); // Directory to store images
            $image->move($imagePath, $imageName); // Move the file to the directory
            $validated['image'] = 'uploads/news/images/' . $imageName; // Store the relative path
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('status-success', 'News created successfully!');
    }

    /**
     * Show the form for editing the specified news item.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified news item in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'image' => 'nullable|image|max:5120', // max 5MB
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'slug' => 'required|string|max:255|unique:news,slug,' . $news->id,
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image && File::exists(public_path($news->image))) {
                File::delete(public_path($news->image));
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom image name
            $imagePath = public_path('uploads/news/images'); // Directory to store images
            $image->move($imagePath, $imageName); // Move the file to the directory
            $validated['image'] = 'uploads/news/images/' . $imageName; // Store the relative path
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('status-success', 'News updated successfully!');
    }

    /**
     * Remove the specified news item from storage.
     */
    public function destroy(News $news)
    {
        // Delete the image if it exists
        if ($news->image && File::exists(public_path($news->image))) {
            File::delete(public_path($news->image));
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('status-success', 'News deleted successfully!');
    }
}
