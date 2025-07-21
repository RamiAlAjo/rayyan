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

        // Search products by English or Arabic title, eager load category/subcategory if needed
        $products = Product::where('name_en', 'LIKE', "%{$query}%")
            ->orWhere('name_ar', 'LIKE', "%{$query}%")
            ->limit(10) // limit results for performance
            ->get();

        // Return JSON with id, titles, and image URL
        return response()->json(
            $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'title_en' => $product->name_en, // Updated here
                    'title_ar' => $product->name_ar,
                    'image' => $product->image ? asset('storage/' . $product->image) : asset('images/placeholder.png'),
                ];
            })
        );
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

        return view('front.search_results', compact('products', 'query'));
    }
}
