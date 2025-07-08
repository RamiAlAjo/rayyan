<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $validated['icon_path'] = $request->file('icon_path')->store('features', 'public');
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
            if ($feature->icon_path) {
                Storage::disk('public')->delete($feature->icon_path);
            }
            $validated['icon_path'] = $request->file('icon_path')->store('features', 'public');
        }

        $feature->update($validated);

        return redirect()->route('admin.features.index')->with('status-success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature)
    {
        if ($feature->icon_path) {
            Storage::disk('public')->delete($feature->icon_path);
        }

        $feature->delete();

        return redirect()->route('admin.features.index')->with('status-success', 'Feature deleted successfully.');
    }
}
