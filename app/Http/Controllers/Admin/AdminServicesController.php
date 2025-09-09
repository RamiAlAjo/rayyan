<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminServicesController extends Controller
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:20048',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $service = new Service();
        $service->name_en = $request->name_en;
        $service->name_ar = $request->name_ar;
        $service->description_en = $request->description_en;
        $service->description_ar = $request->description_ar;
        $service->status = $request->status;

        // Handle Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($image->getClientOriginalName()); // Clean image name
            $imagePath = ('uploads/services/images'); // Directory to store images

            // Ensure the directory exists
            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0775, true); // Create directory if it doesn't exist
            }

            // Move the uploaded image to the desired directory
            $image->move($imagePath, $imageName);

            $service->image = 'uploads/services/images/' . $imageName; // Store relative path
        }

        // Generate a unique slug with a random string
        $service->slug = Str::slug($request->name_en) . '-' . Str::random(5);
        $service->save();

        return redirect()->route('admin.services.index')->with('status-success', 'Service created successfully!');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name_en' => 'required|string|max:2055',
            'name_ar' => 'required|string|max:2055',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'nullable|image|max:20048',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $service->name_en = $request->name_en;
        $service->name_ar = $request->name_ar;
        $service->description_en = $request->description_en;
        $service->description_ar = $request->description_ar;
        $service->status = $request->status;

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if (File::exists(($service->image))) {
                File::delete(($service->image)); // Delete old image file
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($image->getClientOriginalName()); // Clean image name
            $imagePath = ('uploads/services/images'); // Directory to store images

            // Ensure the directory exists
            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0775, true); // Create directory if it doesn't exist
            }

            // Move the uploaded image to the desired directory
            $image->move($imagePath, $imageName);

            $service->image = 'uploads/services/images/' . $imageName; // Store relative path
        }

        // Update slug (even though it's the same, regenerate to ensure consistency)
        $service->slug = Str::slug($request->name_en) . '-' . Str::random(5);
        $service->save();

        return redirect()->route('admin.services.index')->with('status-success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        // Delete image if it exists
        if (File::exists(($service->image))) {
            File::delete(($service->image)); // Delete old image file
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('status-success', 'Service deleted successfully!');
    }
}
