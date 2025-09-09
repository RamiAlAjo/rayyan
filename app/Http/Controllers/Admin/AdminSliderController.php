<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PagesSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the sliders.
     */
    public function index()
    {
        $sliders = PagesSlider::all(); // Fetch all sliders
        return view('admin.homepage.slider.index', compact('sliders')); // Pass to view
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create()
    {
        return view('admin.homepage.slider.create');
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'title_en' => 'required|string|max:2055',
            'title_ar' => 'nullable|string|max:2055',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'url' => 'nullable|url',
        ]);

        // Handle the image upload and storage in the public folder
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $imageExtension;
            $imagePath = ('uploads/sliders/images'); // The public directory
            $image->move($imagePath, $imageName); // Move the file to the directory

            $imageUrl = 'uploads/sliders/images/' . $imageName; // Store the relative path for public access
        }

        // Create the new slider
        PagesSlider::create([
            'title_en' => $validatedData['title_en'],
            'title_ar' => $validatedData['title_ar'] ?? null,  // If the Arabic title is empty, make it null
            'image' => $imageUrl,  // Store the image path relative to public folder
            'url' => $validatedData['url'] ?? null,  // If no URL is provided, make it null
        ]);

        // Redirect with success message
        return redirect()->route('admin.slider.index')->with('success', 'Slider image added successfully.');
    }

    /**
     * Show the form for editing the specified slider.
     */
    public function edit($id)
    {
        $slider = PagesSlider::find($id);

        if (!$slider) {
            return redirect()->route('admin.slider.index')->with('status-error', 'Slider not found.');
        }

        return view('admin.homepage.slider.edit', compact('slider'));
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = PagesSlider::find($id);

        if (!$slider) {
            return redirect()->route('admin.slider.index')->with('status-error', 'Slider not found.');
        }

        // Validate the incoming data
        $request->validate([
            'title_en' => 'required|string|max:2055',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
        ]);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (File::exists(($slider->image))) {
                File::delete(($slider->image));
            }

            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $imageExtension;
            $imagePath = ('uploads/sliders/images');
            $image->move($imagePath, $imageName);

            // Update the image path
            $slider->image = 'uploads/sliders/images/' . $imageName;
        }

        // Update slider title
        $slider->title_en = $request->title_en;
        $slider->save();

        return redirect()->route('admin.slider.index')->with('status-success', 'Slider updated successfully!');
    }

    /**
     * Remove the specified slider from storage.
     */
    public function destroy($id)
    {
        $slider = PagesSlider::find($id);

        if (!$slider) {
            return redirect()->route('admin.slider.index')->with('status-error', 'Slider not found.');
        }

        // Delete the image file if it exists
        if (File::exists(($slider->image))) {
            File::delete(($slider->image));
        }

        $slider->delete();

        return redirect()->route('admin.slider.index')->with('status-success', 'Slider deleted successfully!');
    }
}
