<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminFeaturesController extends Controller
{
    // Display the list of features
    public function index()
    {
        $features = Feature::orderBy('order')->get();
        return view('admin.features.index', compact('features'));
    }

    // Show the form for creating a new feature
    public function create()
    {
        return view('admin.features.create');
    }

    // Store a new feature
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'title_en' => 'required|string|max:2055',
            'title_ar' => 'required|string|max:2055',
            'icon_path' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:20048', // File validation
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle file upload manually if an icon is uploaded
        if ($request->hasFile('icon_path')) {
            // Get the uploaded file and generate a unique name
            $icon = $request->file('icon_path');
            $iconName = time() . '_' . $icon->getClientOriginalName(); // Custom file name
            $iconPath = ('uploads/features'); // Path where icons will be stored

            // Ensure the directory exists
            if (!File::exists($iconPath)) {
                File::makeDirectory($iconPath, 0775, true);
            }

            // Move the file to the desired directory
            $icon->move($iconPath, $iconName);

            // Save the relative path in the database
            $validated['icon_path'] = 'uploads/features/' . $iconName;
        }

        // Create the new feature in the database
        Feature::create($validated);

        // Redirect to the features list with a success message
        return redirect()->route('admin.features.index')->with('status-success', 'Feature created successfully.');
    }

    // Show the form for editing a specific feature
    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    // Update an existing feature
    public function update(Request $request, Feature $feature)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title_en' => 'required|string|max:2055',
            'title_ar' => 'required|string|max:2055',
            'icon_path' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:20048', // File validation
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle file upload manually if a new icon is uploaded
        if ($request->hasFile('icon_path')) {
            // Delete the old icon if it exists
            if ($feature->icon_path && File::exists(($feature->icon_path))) {
                File::delete(($feature->icon_path)); // Delete the old file
            }

            // Get the uploaded file and generate a unique name
            $icon = $request->file('icon_path');
            $iconName = time() . '_' . $icon->getClientOriginalName();
            $iconPath = ('uploads/features');

            // Ensure the directory exists
            if (!File::exists($iconPath)) {
                File::makeDirectory($iconPath, 0775, true);
            }

            // Move the file to the desired directory
            $icon->move($iconPath, $iconName);

            // Save the new relative path in the database
            $validated['icon_path'] = 'uploads/features/' . $iconName;
        }

        // Update the feature in the database
        $feature->update($validated);

        // Redirect back with a success message
        return redirect()->route('admin.features.index')->with('status-success', 'Feature updated successfully.');
    }

    // Delete a feature and its associated icon
    public function destroy(Feature $feature)
    {
        // Delete the associated icon file if it exists
        if ($feature->icon_path && File::exists(($feature->icon_path))) {
            File::delete(($feature->icon_path)); // Delete the icon
        }

        // Delete the feature from the database
        $feature->delete();

        // Redirect to the features list with a success message
        return redirect()->route('admin.features.index')->with('status-success', 'Feature deleted successfully.');
    }
}
