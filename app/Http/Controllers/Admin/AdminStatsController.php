<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class AdminStatsController extends Controller
{
    public function index()
    {
        $stats = Stat::paginate(10);
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:2055',
            'title_ar' => 'required|string|max:2055',
            'value' => 'required|string|max:2055',
        ]);

        Stat::create($request->only('title_en', 'title_ar', 'value'));

        return redirect()->route('admin.stats.index')->with('success', 'Stat created successfully.');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $request->validate([
            'title_en' => 'required|string|max:2055',
            'title_ar' => 'required|string|max:2055',
            'value' => 'required|string|max:2055',
        ]);

        $stat->update($request->only('title_en', 'title_ar', 'value'));

        return redirect()->route('admin.stats.index')->with('success', 'Stat updated successfully.');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();

        return redirect()->route('admin.stats.index')->with('success', 'Stat deleted successfully.');
    }
}
