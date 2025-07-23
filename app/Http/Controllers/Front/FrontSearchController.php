<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\Project;
use App\Models\ProjectsCategory;
use App\Models\Category;

class FrontSearchController extends Controller
{
    /**
     * Return JSON response for live search (e.g., AJAX)
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Validate query length
        if (!$query || strlen($query) < 3) {
            return response()->json([]);
        }

        // Search products, categories, subcategories, projects, etc.
        $products = Product::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->limit(10) // limit results for performance
            ->get();

        $productCategories = ProductCategory::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get();

        $productSubcategories = ProductSubcategory::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get();

        $projects = Project::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get();

        $projectsCategories = ProjectsCategory::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get();

        $categories = Category::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get();

        // Return JSON with results from all models
        return response()->json([
            'products' => $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'title_en' => $product->name_en,
                    'title_ar' => $product->name_ar,
                    'type' => 'product',
                    'image' => $product->image ? asset('storage/' . $product->image) : asset('images/placeholder.png'),
                ];
            }),
            'productCategories' => $productCategories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name_en' => $category->name_en,
                    'name_ar' => $category->name_ar,
                    'type' => 'product_category',
                    'image' => $category->image ? asset('storage/' . $category->image) : asset('images/placeholder.png'),
                ];
            }),
            'productSubcategories' => $productSubcategories->map(function ($subcategory) {
                return [
                    'id' => $subcategory->id,
                    'name_en' => $subcategory->name_en,
                    'name_ar' => $subcategory->name_ar,
                    'type' => 'product_subcategory',
                    'image' => $subcategory->image ? asset('storage/' . $subcategory->image) : asset('images/placeholder.png'),
                ];
            }),
            'projects' => $projects->map(function ($project) {
                return [
                    'id' => $project->id,
                    'name_en' => $project->name_en,
                    'name_ar' => $project->name_ar,
                    'type' => 'project',
                    'image' => $project->image ? asset('storage/' . $project->image) : asset('images/placeholder.png'),
                ];
            }),
            'projectsCategories' => $projectsCategories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name_en' => $category->name_en,
                    'name_ar' => $category->name_ar,
                    'type' => 'projects_category',
                    'image' => $category->image ? asset('storage/' . $category->image) : asset('images/placeholder.png'),
                ];
            }),
            'categories' => $categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name_en' => $category->name_en,
                    'name_ar' => $category->name_ar,
                    'type' => 'category',
                    'image' => $category->image ? asset('storage/' . $category->image) : asset('images/placeholder.png'),
                ];
            }),
        ]);
    }

    /**
     * Return search results view (paginated)
     */
    public function searchResults(Request $request)
    {
        $query = $request->input('query');

        // Validate query length
        if (!$query || strlen($query) < 3) {
            return redirect()->back()->with('error', __('Please enter at least 3 characters to search.'));
        }

        // Paginate search results by English or Arabic title
        $products = Product::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->paginate(20);

        $productCategories = ProductCategory::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->paginate(20);

        $productSubcategories = ProductSubcategory::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->paginate(20);

        $projects = Project::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->paginate(20);

        $projectsCategories = ProjectsCategory::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->paginate(20);

        $categories = Category::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->paginate(20);

        return view('front.search_results', compact(
            'products',
            'productCategories',
            'productSubcategories',
            'projects',
            'projectsCategories',
            'categories',
            'query'
        ));
    }
}
