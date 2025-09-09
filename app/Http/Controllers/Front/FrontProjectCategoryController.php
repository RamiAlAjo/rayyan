<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProjectsCategory;
use App\Models\ProjectsSubcategory;

class FrontProjectCategoryController extends Controller
{
    // Show all active project categories, paginated
    public function index()
    {
        $categories = ProjectsCategory::where('status', 1)
            ->latest()
            ->paginate(6); // Pagination for categories

        return view('front.project_Categories', compact('categories'));
    }

    // Show all subcategories under a selected category, paginated
    public function show(ProjectsCategory $projects_category)
    {
        // Get all active subcategories for the selected category, paginated
        $subcategories = ProjectsSubcategory::where('category_id', $projects_category->id)
            ->where('status', 1)
            ->latest()
            ->paginate(6); // Paginate subcategories (6 per page)

        return view('front.project_subcategories', [
            'subcategories' => $subcategories,
            'categoryName' => $projects_category->name_en,
        ]);
    }
}
