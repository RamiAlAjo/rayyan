<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotosGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        // Handle file upload manually
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom image name
            $imagePath = public_path('uploads/photos'); // Directory to store images
            $image->move($imagePath, $imageName); // Move the file to the directory

            // Save the relative path of the image
            $photo->images = 'uploads/photos/' . $imageName;
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

        // Handle file upload manually (if a new image is uploaded)
        if ($request->hasFile('images')) {
            // Delete the old image if it exists
            if (File::exists(public_path($photo->images))) {
                File::delete(public_path($photo->images));
            }

            // Upload new image
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Custom image name
            $imagePath = public_path('uploads/photos'); // Directory to store images
            $image->move($imagePath, $imageName); // Move the file to the directory

            // Save the new image path
            $photo->images = 'uploads/photos/' . $imageName;
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

        // Delete the photo from the file system
        if ($photo->images && File::exists(public_path($photo->images))) {
            File::delete(public_path($photo->images));
        }

        // Delete the photo record from the database
        $photo->delete();

        // Redirect back to the gallery with a success message
        return redirect()->route('admin.gallery.index')->with('status-success', 'Photo deleted successfully!');
    }
}
