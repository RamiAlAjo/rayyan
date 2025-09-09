<style>
/* ----------------- Navbar ----------------- */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 999;
    padding: 0.5rem 1rem;
    background-color: #fff;
    font-size: 18px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.navbar-brand img {
    max-height: 80px;
    max-width: 200px;
    object-fit: contain;
}

.navbar-nav {
    margin: 0 auto;
    flex-wrap: wrap;
}

.nav-link {
    color: #3DA246;
    font-weight: bold;
    padding: 10px 15px;
    transition: color 0.2s ease-in-out;
}

.nav-link:hover,
.nav-link.active {
    color: #3DA246;
}

.nav-link.active {
    border: 2px solid #3DA246;
    border-radius: 5px;
}

/* ----------------- Responsive Navbar ----------------- */
@media (max-width: 992px) {
    .navbar {
        padding: 0.5rem;
    }

    .navbar-brand img {
        max-height: 70px;
        max-width: 150px;
    }

    .navbar-collapse {
        background-color: #fff;
        text-align: center;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        width: 100%;
    }

    .nav-item,
    .d-flex {
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
    }
}

/* ----------------- Search ----------------- */
.search-container-NA {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-left: auto;
    margin-right: 20px;
    z-index: 100;
}

#search-toggle-NA {
    font-size: 1.6rem;
    border: none;
    background: none;
    padding: 10px;
    color: #333;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

#search-toggle-NA:hover {
    background-color: #07d82a;
    color: #fff;
    transform: rotate(360deg);
}

#search-toggle-NA:focus {
    outline: none;
    box-shadow: 0 0 5px #07d82a;
}

.search-input-NA {
    width: 0;
    opacity: 0;
    margin-top: 10px;
    display: none;
    padding: 8px 20px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 50px;
    background: #f8f9fa;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: width 0.4s ease, opacity 0.4s ease;
}

.search-input-NA.show {
    display: block;
    width: 250px;
    opacity: 1;
}

#loading-indicator {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #07d82a;
    font-size: 1rem;
}

/* ----------------- Search Results ----------------- */
#search-results {
    background: #fff;
    width: 100%;
    max-width: 250px;
    max-height: 300px;
    overflow-y: auto;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    display: none;
    margin-top: 8px;
    z-index: 1000;
    transition: opacity 0.3s ease-in-out;
}

#search-results:not(:empty) {
    display: block;
}

.search-results-list {
    list-style: none;
    margin: 0;
    padding: 10px;
}

.search-result-item {
    padding: 12px 15px;
    font-size: 1rem;
    border-bottom: 1px solid #eee;
    transition: background-color 0.3s ease;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

.search-result-link {
    display: block;
    font-weight: 500;
    text-decoration: none;
    color: #333;
    transition: all 0.2s ease-in-out;
}

.search-result-link:hover {
    color: #07d82a;
    background: #f1f1f1;
    padding-left: 10px;
}

.search-no-results {
    padding: 15px;
    text-align: center;
    color: #888;
    font-size: 14px;
}

.see-all-link {
    display: block;
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
    text-align: center;
    background-color: #07d82a;
    color: white;
    text-decoration: none;
}

.see-all-link:hover {
    background-color: #05a922;
}

/* ----------------- Dropdown Hover Menus ----------------- */
.dropdown-hover:hover .dropdown-menu-products {
    display: block;
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-menu-products {
    display: block;
    opacity: 0;
    visibility: hidden;
    position: absolute;
    top: 100%;
    z-index: 1000;
    min-width: 220px;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    transition: all 0.2s ease-in-out;
    transform: translateY(10px);
}

.dropdown-menu-products a {
    display: block;
    padding: 8px 16px;
    color: #212529;
    text-decoration: none;
}

.dropdown-menu-products a:hover {
    background-color: #f8f9fa;
}

.dropdown-submenu {
    position: relative;
}

.subcategory-menu,
.product-menu {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    min-width: 200px;
    z-index: 1001;
    background: white;
    border: 1px solid #ddd;
    transition: all 0.2s ease;
}

.dropdown-submenu:hover > .subcategory-menu,
.dropdown-submenu:hover > .product-menu {
    display: block;
}

.subcategory-menu a,
.product-menu a {
    padding: 8px 16px;
    white-space: nowrap;
    color: #212529;
    text-decoration: none;
    display: block;
}

.subcategory-menu a:hover,
.product-menu a:hover {
    background-color: #f8f9fa;
}

/* ----------------- Mobile Tweaks ----------------- */
@media (max-width: 991.98px) {
    .search-container-NA {
        margin-right: 0;
        align-items: center;
    }

    .search-input-NA {
        width: 100%;
        text-align: center;
        margin-top: 10px;
    }

    #search-toggle-NA {
        margin-top: 10px;
    }

    .dropdown-hover .dropdown-menu {
        position: static !important;
        display: none;
    }

    .dropdown-hover.show .dropdown-menu,
    .dropdown-submenu.show .dropdown-menu {
        display: block;
    }

    .dropdown-submenu > a::after {
        content: ' ▼';
        float: right;
    }

    .dropdown-submenu > a {
        cursor: pointer;
    }

    /* Mobile search button tweaks */
    #search-toggle-NA {
        margin-right: 10px;
    }
}

@media (max-width: 767px) {
    .search-input-NA {
        font-size: 1rem;
    }

    #search-results {
        max-width: 100%;
        margin-top: 10px;
    }

    .search-result-item {
        padding: 12px 15px;
    }
}

</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('Rayyan_Logo.svg') }}" alt="Rayyan Logo" class="navbar-logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto d-flex justify-content-center align-items-center w-100 gap-2">
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about.index') }}">{{ __('about_us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('services') ? 'active' : '' }}" href="{{ route('services.index') }}">{{ __('services') }}</a>
                </li>

             @php
    use App\Models\ProductCategory;
    use App\Models\Product;

    $productCategories = ProductCategory::with([
        'subcategories.products' => function ($query) {
            $query->where('status', 'active');
        },
        'products' => function ($query) {
            $query->where('status', 'active')->whereNull('subcategory_id');
        }
    ])
    ->where('status', 'active')
    ->get();

    // Fully uncategorized products (not attached to category or subcategory)
    $uncategorizedProducts = Product::whereNull('category_id')
        ->whereNull('subcategory_id')
        ->where('status', 'active')
        ->get();
@endphp

<li class="nav-item dropdown position-static dropdown-hover">
    <a class="nav-link nav-link-NA {{ Request::is('product-category*') ? 'active' : '' }}"
       href="{{ route('product-category.index') }}" id="productsDropdown">
        {{ __('products') }}
    </a>

    <div class="dropdown-menu shadow mt-2 dropdown-menu-products" aria-labelledby="productsDropdown">
        {{-- Loop through product categories --}}
        @foreach($productCategories as $category)
            <div class="dropdown-submenu">
                <a class="dropdown-item d-flex justify-content-between align-items-center"
                   href="{{ route('product-category.show', $category->id) }}">
                    {{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}
                    @if($category->subcategories->count())
                        <span class="ms-2">&#9656;</span>
                    @endif
                </a>

                {{-- Subcategories --}}
                @if($category->subcategories->count() || $category->products->count())
                    <div class="dropdown-menu subcategory-menu">
                        {{-- Products directly under the category (no subcategory) --}}
                        @foreach($category->products as $product)
                            <a class="dropdown-item" href="{{ route('product.show', $product->id) }}">
                                {{ app()->getLocale() === 'ar' ? $product->name_ar : $product->name_en }}
                            </a>
                        @endforeach

                        {{-- Subcategories with their products --}}
                        @foreach($category->subcategories as $subcategory)
                            <div class="dropdown-submenu">
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                   href="{{ route('product-subcategory.show', $subcategory->id) }}">
                                    {{ app()->getLocale() === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}
                                    @if($subcategory->products->count())
                                        <span class="ms-2">&#9656;</span>
                                    @endif
                                </a>

                                @if($subcategory->products->count())
                                    <div class="dropdown-menu product-menu">
                                        @foreach($subcategory->products as $product)
                                            <a class="dropdown-item" href="{{ route('product.show', $product->id) }}">
                                                {{ app()->getLocale() === 'ar' ? $product->name_ar : $product->name_en }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach

        {{-- Fully uncategorized products (no category, no subcategory) --}}
        @foreach($uncategorizedProducts as $product)
            <a class="dropdown-item" href="{{ route('product.show', $product->id) }}">
                {{ app()->getLocale() === 'ar' ? $product->name_ar : $product->name_en }}
            </a>
        @endforeach
    </div>
</li>


@php
    use App\Models\ProjectsCategory;
    use App\Models\Project;

    // Load categories with their subcategories and all related projects
    $projectsCategories = ProjectsCategory::with([
        'subcategories.projects' => function ($query) {
            $query->where('status', 1);
        },
        'projects' => function ($query) {
            $query->where('status', 1);
        }
    ])->where('status', 1)->get();

    // Projects with no category and no subcategory
    $uncategorizedProjects = Project::whereNull('category_id')
        ->whereNull('subcategory_id')
        ->where('status', 1)
        ->get();
@endphp
<li class="nav-item dropdown position-static dropdown-hover">
    <a class="nav-link nav-link-NA {{ Request::is('projects-category*') ? 'active' : '' }}"
       href="{{ route('projects-category.index') }}" id="projectsDropdown">
        {{ __('projects') }}
    </a>

    <div class="dropdown-menu shadow mt-2 dropdown-menu-products" aria-labelledby="projectsDropdown">

        {{-- Loop through categories --}}
        @foreach($projectsCategories as $category)
            <div class="dropdown-submenu">
                <a class="dropdown-item d-flex justify-content-between align-items-center"
                   href="{{ route('projects-category.show', $category->id) }}">
                    {{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}
                    @if($category->subcategories->count() || $category->projects->count())
                        <span class="ms-2">&#9656;</span>
                    @endif
                </a>

                @if($category->subcategories->count() || $category->projects->count())
                    <div class="dropdown-menu subcategory-menu">

                        {{-- Category-level projects (no subcategory) --}}
                        @foreach($category->projects as $project)
                            <a class="dropdown-item" href="{{ route('projects.show', $project->id) }}">
                                {{ app()->getLocale() === 'ar' ? $project->name_ar : $project->name_en }}
                            </a>
                        @endforeach

                        {{-- Subcategories --}}
                        @foreach($category->subcategories as $subcategory)
                            <div class="dropdown-submenu">
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                   href="{{ route('projects-subcategory.show', $subcategory->id) }}">
                                    {{ app()->getLocale() === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}
                                    @if($subcategory->projects->count())
                                        <span class="ms-2">&#9656;</span>
                                    @endif
                                </a>

                                @if($subcategory->projects->count())
                                    <div class="dropdown-menu product-menu">
                                        @foreach($subcategory->projects as $project)
                                            <a class="dropdown-item" href="{{ route('projects.show', $project->id) }}">
                                                {{ app()->getLocale() === 'ar' ? $project->name_ar : $project->name_en }}
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach

        {{-- Projects without any category or subcategory --}}
        @foreach($uncategorizedProjects as $project)
            <a class="dropdown-item" href="{{ route('projects.show', $project->id) }}">
                {{ app()->getLocale() === 'ar' ? $project->name_ar : $project->name_en }}
            </a>
        @endforeach

    </div>
</li>


@php
    use App\Models\Portfolio;
    $portfolios = Portfolio::latest()->get();
@endphp

<li class="nav-item dropdown position-static dropdown-hover">
    <a class="nav-link nav-link-NA {{ Request::is('portfolio') ? 'active' : '' }}"
       href="{{ route('portfolio.index') }}" id="portfolioDropdown">
        {{ __('company_profile') }}
    </a>

    @if($portfolios->count())
        <div class="dropdown-menu shadow mt-2 dropdown-menu-products" aria-labelledby="portfolioDropdown">
            @foreach($portfolios as $portfolio)
                <a class="dropdown-item" href="{{ asset('/' . $portfolio->resume_path) }}" target="_blank">
                    {{ app()->getLocale() === 'ar' ? $portfolio->portfolio_name_ar : $portfolio->portfolio_name_en }}
                </a>
            @endforeach
        </div>
    @endif
</li>


                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('faq') ? 'active' : '' }}" href="{{ route('faq.index') }}">{{ __('faq') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('career') ? 'active' : '' }}" href="{{ route('career.index') }}">{{ __('careers') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact.index') }}">{{ __('contact_us') }}</a>
                </li>

                <!-- Language Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLanguageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ session('locale', 'en') == 'en' ? 'En' : 'Ar' }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarLanguageDropdown">
                        <li><a class="dropdown-item" href="{{ route('change.language', ['locale' => 'en']) }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ route('change.language', ['locale' => 'ar']) }}">Arabic</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Search -->
            <div class="search-container-NA">
                <button id="search-toggle-NA" type="button">
                    <i class="bi bi-search"></i>
                </button>
                <input type="text" class="form-control_NA search-input-NA" id="search-input-NA" placeholder="Search...">
                <div id="loading-indicator" style="display: none;">Loading...</div>
                <div id="search-results"></div>
            </div>
        </div>
    </div>
</nav>


<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchToggle = document.getElementById("search-toggle-NA");
    const searchInput = document.getElementById("search-input-NA");
    const searchContainer = document.querySelector(".search-container-NA");
    const loadingIndicator = document.getElementById("loading-indicator");
    const searchResults = document.getElementById("search-results");

    searchToggle.addEventListener("click", function() {
        searchContainer.classList.toggle("active");
        searchInput.focus();
    });

    searchInput.addEventListener("input", function() {
        const query = searchInput.value;
        if (query.length >= 3) {
            loadingIndicator.style.display = "block";
            searchResults.innerHTML = "";  // Clear previous results
            fetch(`/search?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    loadingIndicator.style.display = "none";
                    if (data.results.length > 0) {
                        searchResults.innerHTML = data.results.map(item => `<div class="result-item">${item.name}</div>`).join('');
                    } else {
                        searchResults.innerHTML = "<div class='no-results'>No results found</div>";
                    }
                });
        } else {
            searchResults.innerHTML = "";
            loadingIndicator.style.display = "none";
        }
    });
});
</script>

<style>
/* Mobile search input */
.search-container-NA {
    display: none;
    position: absolute;
    top: 50px;
    right: 20px;
    width: 200px;
    transition: all 0.3s ease;
}
.search-container-NA.active {
    display: block;
}
.search-input-NA {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
}
#search-results {
    margin-top: 10px;
    max-height: 200px;
    overflow-y: auto;
}
#search-results .result-item {
    padding: 8px;
    cursor: pointer;
}
#search-results .no-results {
    padding: 8px;
    color: gray;
}
</style>
