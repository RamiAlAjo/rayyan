@extends('front.layouts.app')
<x-front-slider />
@section('content')

<div class="container mt-5">
    @if(session('error'))
        <div class="alert alert-danger text-center mt-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="container">
        <h2 class="search-title text-center mb-4 mt-2">
            {{ __('search_results_for') }}: <span class="text-primary">"{{ $query }}"</span>
        </h2>

        @if($products->isEmpty() && $productCategories->isEmpty() && $productSubcategories->isEmpty() && $projects->isEmpty() && $projectsCategories->isEmpty() && $categories->isEmpty())
            <div class="no-results text-center">
                <p>{{ __('no_results_found') }}</p>
            </div>
        @else
            <div class="results-list">
                @php $locale = app()->getLocale(); @endphp

                {{-- Product Section --}}
                @if($products->isNotEmpty())
                    <div class="section-container">
                        <h3 class="section-title mt-5">{{ __('Products') }}</h3>
                        <div class="cards-container">
                            @foreach($products as $product)
                                <div class="result-item">
                                    <div class="product-card">
                                        <a class="text-dark" href="{{ route('product.show', $product->id) }}">
                                            <div class="product-image">
                                                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/placeholder.png') }}"
                                                     alt="{{ $locale === 'ar' ? $product->name_ar : $product->name_en }}" class="img-fluid lazyload">
                                            </div>
                                        </a>
                                        <div class="product-info">
                                            <h3 class="product-title">{{ $locale === 'ar' ? $product->name_ar : $product->name_en }}</h3>
                                            <p class="product-description">
                                                {{ Str::limit($locale === 'ar' ? $product->description_ar : $product->description_en, 120) }}
                                            </p>
                                            <p class="product-date">{{ __('published_on') }} {{ $product->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Product Categories Section --}}
                @if($productCategories->isNotEmpty())
                    <div class="section-container">
                        <h3 class="section-title mt-5">{{ __('Product Categories') }}</h3>
                        <div class="cards-container">
                            @foreach($productCategories as $category)
                                <div class="result-item">
                                    <div class="category-card">
                                        <a class="text-dark" href="{{ route('product-category.show', $category->id) }}">
                                            <div class="category-image">
                                                <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/placeholder.png') }}"
                                                     alt="{{ $locale === 'ar' ? $category->name_ar : $category->name_en }}" class="img-fluid lazyload">
                                            </div>
                                        </a>
                                        <div class="category-info">
                                            <h3 class="category-title">{{ $locale === 'ar' ? $category->name_ar : $category->name_en }}</h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Product Subcategories Section --}}
                @if($productSubcategories->isNotEmpty())
                    <div class="section-container">
                        <h3 class="section-title mt-5">{{ __('Product Subcategories') }}</h3>
                        <div class="cards-container">
                            @foreach($productSubcategories as $subcategory)
                                <div class="result-item">
                                    <div class="subcategory-card">
                                        <a class="text-dark" href="{{ route('product-subcategory.show', $subcategory->id) }}">
                                            <div class="subcategory-image">
                                                <img src="{{ $subcategory->image ? asset('storage/' . $subcategory->image) : asset('images/placeholder.png') }}"
                                                     alt="{{ $locale === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}" class="img-fluid lazyload">
                                            </div>
                                        </a>
                                        <div class="subcategory-info">
                                            <h3 class="subcategory-title">{{ $locale === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}</h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Projects Section --}}
                @if($projects->isNotEmpty())
                    <div class="section-container">
                        <h3 class="section-title mt-5">{{ __('Projects') }}</h3>
                        <div class="cards-container">
                            @foreach($projects as $project)
                                <div class="result-item">
                                    <div class="project-card">
                                        <a class="text-dark" href="{{ route('projects.show', $project->id) }}">
                                            <div class="project-image">
                                                <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/placeholder.png') }}"
                                                     alt="{{ $locale === 'ar' ? $project->name_ar : $project->name_en }}" class="img-fluid lazyload">
                                            </div>
                                        </a>
                                        <div class="project-info">
                                            <h3 class="project-title">{{ $locale === 'ar' ? $project->name_ar : $project->name_en }}</h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Project Categories Section --}}
                @if($projectsCategories->isNotEmpty())
                    <div class="section-container">
                        <h3 class="section-title mt-5">{{ __('Project Categories') }}</h3>
                        <div class="cards-container">
                            @foreach($projectsCategories as $category)
                                <div class="result-item">
                                    <div class="project-category-card">
                                        <a class="text-dark" href="{{ route('projects-category.show', $category->id) }}">
                                            <div class="project-category-image">
                                                <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/placeholder.png') }}"
                                                     alt="{{ $locale === 'ar' ? $category->name_ar : $category->name_en }}" class="img-fluid lazyload">
                                            </div>
                                        </a>
                                        <div class="project-category-info">
                                            <h3 class="project-category-title">{{ $locale === 'ar' ? $category->name_ar : $category->name_en }}</h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="pagination d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/lazysizes@5.2.1/lazysizes.min.js" async></script>

<style>
    /* Global Styles */
    .search-title {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 30px;
        color: #333;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 600;
        color: #444;
        margin-top: 40px;
        text-decoration: underline;
        text-transform: uppercase;
    }

    .section-container {
        margin-bottom: 40px;
    }

    .cards-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .result-item {
        flex: 0 0 calc(33.333% - 20px);
        margin-bottom: 20px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
        overflow: hidden;
    }

    .result-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        border: 2px solid #007bff;
    }

    .product-card, .category-card, .subcategory-card, .project-card, .project-category-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .product-image, .category-image, .subcategory-image, .project-image, .project-category-image {
        width: 100%;
        height: 250px;
        overflow: hidden;
        border-radius: 12px 12px 0 0;
    }

    .product-image img, .category-image img, .subcategory-image img, .project-image img, .project-category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-info, .category-info, .subcategory-info, .project-info, .project-category-info {
        padding: 20px;
        flex-grow: 1;
        background-color: #f9f9f9;
    }

    .product-title, .category-title, .subcategory-title, .project-title, .project-category-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 12px;
    }

    .product-description {
        font-size: 1rem;
        color: #666;
        margin-bottom: 15px;
    }

    .product-date {
        font-size: 0.9rem;
        color: #aaa;
    }

    .pagination {
        margin-top: 30px;
        text-align: center;
    }

    .pagination a {
        text-decoration: none;
        color: #007bff;
        font-size: 1rem;
        margin: 0 5px;
        padding: 6px 12px;
        border-radius: 5px;
        background-color: #f8f9fa;
        transition: background-color 0.3s ease;
    }

    .pagination a:hover {
        color: #0056b3;
        background-color: #e2e6ea;
    }

    @media (max-width: 1024px) {
        .result-item {
            flex: 0 0 calc(50% - 20px);
        }
    }

    @media (max-width: 768px) {
        .result-item {
            flex: 0 0 100%;
        }

        .search-title {
            font-size: 2rem;
        }

        .section-title {
            font-size: 1.8rem;
        }
    }

    .lazyload {
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .lazyload.loaded {
        opacity: 1;
    }
</style>

@endsection
