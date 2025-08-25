<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminFeaturesController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('order')->get();
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'icon_path' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('icon_path')) {
            // Handle file upload manually
            $icon = $request->file('icon_path');
            $iconName = time() . '_' . $icon->getClientOriginalName(); // Custom image name
            $iconPath = public_path('uploads/features'); // Directory to store icons
            $icon->move($iconPath, $iconName); // Move the file to the directory

            $validated['icon_path'] = 'uploads/features/' . $iconName; // Store relative path in the DB
        }

        Feature::create($validated);

        return redirect()->route('admin.features.index')->with('status-success', 'Feature created successfully.');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'icon_path' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('icon_path')) {
            // Delete old icon if it exists
            if ($feature->icon_path && File::exists(public_path($feature->icon_path))) {
                File::delete(public_path($feature->icon_path));
            }

            // Handle file upload manually
            $icon = $request->file('icon_path');
            $iconName = time() . '_' . $icon->getClientOriginalName(); // Custom image name
            $iconPath = public_path('uploads/features'); // Directory to store icons
            $icon->move($iconPath, $iconName); // Move the file to the directory

            $validated['icon_path'] = 'uploads/features/' . $iconName; // Store relative path in the DB
        }

        $feature->update($validated);

        return redirect()->route('admin.features.index')->with('status-success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature)
    {
        // Delete icon if it exists
        if ($feature->icon_path && File::exists(public_path($feature->icon_path))) {
            File::delete(public_path($feature->icon_path));
        }

        $feature->delete();

        return redirect()->route('admin.features.index')->with('status-success', 'Feature deleted successfully.');
    }
}
