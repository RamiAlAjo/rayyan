<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotosGallery;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    // Show the list of photos in the gallery
    public function index()
    {
        // Get all photos from the gallery
        $photos = PhotosGallery::all();

        // Return the view with the photos
        return view('admin.gallery.index', compact('photos'));
    }

    // Show the form to create a new photo
    public function create()
    {
        return view('admin.gallery.create');
    }

    // Store a new photo in the gallery
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'image_title_en' => 'nullable|string|max:255',
            'image_title_ar' => 'nullable|string|max:255',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new photo record
        $photo = new PhotosGallery();
        $photo->image_title_en = $request->image_title_en;
        $photo->image_title_ar = $request->image_title_ar;

        // Handle file upload
        if ($request->hasFile('images')) {
            $photo->images = $request->file('images')->store('photos', 'public');
        }

        // Save the record in the database
        $photo->save();

        // Redirect back to the gallery with a success message
        return redirect()->route('admin.gallery.index')->with('status-success', 'Photo added successfully!');
    }

    // Show the form to edit an existing photo
    public function edit($id)
    {
        $photo = PhotosGallery::findOrFail($id);

        return view('admin.gallery.edit', compact('photo'));
    }

    // Update an existing photo
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'image_title_en' => 'nullable|string|max:255',
            'image_title_ar' => 'nullable|string|max:255',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the photo and update the record
        $photo = PhotosGallery::findOrFail($id);
        $photo->image_title_en = $request->image_title_en;
        $photo->image_title_ar = $request->image_title_ar;

        // Handle file upload (if a new image is uploaded)
        if ($request->hasFile('images')) {
            $photo->images = $request->file('images')->store('photos', 'public');
        }

        // Save the updated record
        $photo->save();

        // Redirect back to the gallery with a success message
        return redirect()->route('admin.gallery.index')->with('status-success', 'Photo updated successfully!');
    }

    // Delete an existing photo
    public function destroy($id)
    {
        $photo = PhotosGallery::findOrFail($id);

        // Delete the photo from the database
        $photo->delete();

        // Redirect back to the gallery with a success message
        return redirect()->route('admin.gallery.index')->with('status-success', 'Photo deleted successfully!');
    }
}
