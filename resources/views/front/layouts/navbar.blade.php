<style>
   /* Navbar Styles */
.navbar {
    position: fixed;
    top: 0;
    z-index: 999;
    width: 100%;
    font-size: 18px;
    background-color: white;
    padding: 0.5rem 1rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.navbar-brand img {
    height: auto;
    max-height: 80px;
    width: auto;
    max-width: 200px;
    object-fit: contain;
}

.nav-link {
    color: black;
    font-weight: bold;
    padding: 10px 15px;
    transition: color 0.2s ease-in-out;
}

.nav-link:hover {
    color: gray;
}

.navbar-nav {
    margin: 0 auto;
    flex-wrap: wrap;
}

.nav-link.active {
    border: 2px solid black;
    color: black;
    border-radius: 5px;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 992px) {
    .navbar {
        padding: 0.5rem;
    }

    .navbar-brand img {
        max-height: 70px;
        max-width: 150px;
    }

    .navbar-collapse {
        text-align: center;
        background-color: #fff;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: center;
        width: 100%;
        gap: 8px;
        font-size: 14px;
    }

    .nav-item {
        width: 100%;
    }

    .d-flex {
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }
}

/* Search Container and Input */
.search-container-NA {
    position: relative;
    display: flex;
    align-items: center;
    margin-left: auto;
    margin-right: 20px;
    flex-direction: column;
    z-index: 100;
}

.search-input-NA {
    width: 0;
    opacity: 0;
    transition: width 0.4s ease, opacity 0.4s ease;
    border: 1px solid #ccc;
    border-radius: 50px;
    padding: 8px 20px;
    font-size: 1rem;
    background: #f8f9fa;
    outline: none;
    display: none;
    margin-top: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.search-input-NA.show {
    display: block;
    width: 250px;
    opacity: 1;
}

#search-toggle-NA {
    font-size: 1.6rem;
    border: none;
    background: none;
    padding: 10px;
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease, background-color 0.3s ease;
    border-radius: 50%;
    color: #333;
}

#search-toggle-NA:hover {
    color: #fff;
    background-color: #07d82a;
    transform: rotate(360deg);
}

#search-toggle-NA:focus {
    outline: none;
    box-shadow: 0 0 5px #07d82a;
}

/* Search Results Styles */
#search-results {
    background: white;
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
    padding: 10px;
    margin: 0;
}

.search-result-item {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    font-size: 1rem;
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
    text-decoration: none;
    color: #333;
    font-weight: 500;
    display: block;
    transition: 0.2s ease-in-out;
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

#loading-indicator {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 1rem;
    color: #07d82a;
}

/* Mobile Styles */
@media (max-width: 991px) {
    .search-container-NA {
        margin-right: 0;
        flex-direction: column;
        align-items: center;
    }

    .search-input-NA {
        width: 100%;
        max-width: 100%;
        text-align: center;
        margin-top: 10px;
    }

    #search-toggle-NA {
        font-size: 1.6rem;
        padding: 10px;
        margin-top: 10px;
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

.see-all-link {
    text-align: center;
    display: block;
    padding: 10px;
    background-color: #07d82a;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}

.see-all-link:hover {
    background-color: #05a922;
}

/* Dropdown Hover Menu */
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
    min-width: 200px;
    background-color: #fff;
    border: 1px solid #ddd;
    transition: all 0.2s ease-in-out;
    transform: translateY(10px);
    padding: 10px 0;
}

.dropdown-menu-products a {
    padding: 8px 16px;
    color: #212529;
    text-decoration: none;
    display: block;
}

.dropdown-menu-products a:hover {
    background-color: #f8f9fa;
}

.dropdown-submenu {
    position: relative;
}

.subcategory-menu {
    display: none;
    position: absolute;
    top: 10%;
    left: 100%;
    min-width: 200px;
    background: white;
    border: 1px solid #ddd;
    z-index: 1001;
}

.dropdown-submenu:hover .subcategory-menu {
    display: block;
}

.subcategory-menu a {
    padding: 8px 16px;
    color: #212529;
    white-space: nowrap;
}

.subcategory-menu a:hover {
    background-color: #f8f9fa;
}

.product-menu,
.subcategory-menu {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    min-width: 200px;
    background: white;
    border: 1px solid #ddd;
    z-index: 1001;
    transition: all 0.2s ease;
}

.dropdown-submenu:hover > .subcategory-menu,
.dropdown-submenu:hover > .product-menu {
    display: block;
}

.product-menu a,
.subcategory-menu a {
    white-space: nowrap;
    padding: 8px 16px;
    text-decoration: none;
    display: block;
    color: #212529;
}

.product-menu a:hover,
.subcategory-menu a:hover {
    background-color: #f8f9fa;
}

.dropdown-menu-products {
    min-width: 220px;
    padding: 10px;
}

.dropdown-hover:hover .dropdown-menu {
    display: block;
}

.navbar-nav .nav-link {
    color: #3DA246 !important;
}

.navbar-nav .nav-link.active {
    color: #3DA246 !important;
}

.navbar-nav .nav-link:hover {
    color: #3DA246 !important;
}


/* Show nested hover dropdown only on large screens */
@media (max-width: 991.98px) {
    .dropdown-hover .dropdown-menu {
        position: static !important;
        display: none;
    }

    .dropdown-hover.show .dropdown-menu {
        display: block;
    }

    .dropdown-submenu .dropdown-menu {
        display: none;
    }

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
}

</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top ">
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

    $productCategories = ProductCategory::with([
        'subcategories.products' => function ($query) {
            $query->where('status', 'active');
        }
    ])
    ->where('status', 'active')
    ->get();
@endphp

<li class="nav-item dropdown position-static dropdown-hover">
    <a class="nav-link nav-link-NA {{ Request::is('product-category') ? 'active' : '' }}"
       href="{{ route('product-category.index') }}"
       id="productsDropdown">
        {{ __('products') }}
    </a>

    <!-- Level 1: Categories -->
    <div class="dropdown-menu shadow mt-2 dropdown-menu-products" aria-labelledby="productsDropdown">
        @foreach($productCategories as $category)
            <div class="dropdown-submenu">
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('product-category.show', $category->slug) }}">
                    {{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}
                    @if($category->subcategories->count())
                        <span class="ms-2">&#9656;</span>
                    @endif
                </a>

                <!-- Level 2: Subcategories -->
                @if($category->subcategories->count())
                    <div class="dropdown-menu subcategory-menu">
                        @foreach($category->subcategories as $subcategory)
                            <div class="dropdown-submenu">
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('product-subcategory.show', $subcategory->slug) }}">
                                    {{ app()->getLocale() === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}
                                    @if($subcategory->products->count())
                                        <span class="ms-2">&#9656;</span>
                                    @endif
                                </a>

                                <!-- Level 3: Products -->
                                @if($subcategory->products->count())
                                    <div class="dropdown-menu product-menu">
                                        @foreach($subcategory->products as $product)
                                            <a class="dropdown-item" href="{{ route('product.show', $product->slug) }}">
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
    </div>
</li>

@php
    use App\Models\ProjectsCategory;

    $projectsCategories = ProjectsCategory::with([
        'subcategories.projects' => function ($query) {
            $query->where('status', 1);
        }
    ])
    ->where('status', 1)
    ->get();
@endphp

<li class="nav-item dropdown position-static dropdown-hover">
    <a class="nav-link nav-link-NA {{ Request::is('projects-category') ? 'active' : '' }}"
       href="{{ route('projects-category.index') }}"
       id="projectsDropdown">
        {{ __('projects') }}
    </a>

    <!-- Level 1: Project Categories -->
    <div class="dropdown-menu shadow mt-2 dropdown-menu-products" aria-labelledby="projectsDropdown">
        @foreach($projectsCategories as $category)
            <div class="dropdown-submenu">
                <a class="dropdown-item d-flex justify-content-between align-items-center"
                   href="{{ route('projects-category.show', $category->slug) }}">
                    {{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}
                    @if($category->subcategories->count())
                        <span class="ms-2">&#9656;</span>
                    @endif
                </a>

                <!-- Level 2: Subcategories -->
                @if($category->subcategories->count())
                    <div class="dropdown-menu subcategory-menu">
                        @foreach($category->subcategories as $subcategory)
                            <div class="dropdown-submenu">
                                <a class="dropdown-item d-flex justify-content-between align-items-center"
                                   href="{{ route('projects-subcategory.show', $subcategory->slug) }}">
                                    {{ app()->getLocale() === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}
                                    @if($subcategory->projects->count())
                                        <span class="ms-2">&#9656;</span>
                                    @endif
                                </a>

                                <!-- Level 3: Projects -->
                                @if($subcategory->projects->count())
                                    <div class="dropdown-menu product-menu">
                                        @foreach($subcategory->projects as $project)
                                            <a class="dropdown-item"
                                               href="{{ route('projects.show', $project->slug) }}">
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
    </div>
</li>

     @php
    use App\Models\Portfolio;

    $portfolios = Portfolio::latest()->get(); // or add ->where('status', 'active') if needed
@endphp
<li class="nav-item dropdown position-static dropdown-hover">
    <a class="nav-link nav-link-NA {{ Request::is('portfolio') ? 'active' : '' }}"
       href="{{ route('portfolio.index') }}"
       id="portfolioDropdown">
        {{ __('company_profile') }}
    </a>

    @if($portfolios->count())
        <div class="dropdown-menu shadow mt-2 dropdown-menu-products" aria-labelledby="portfolioDropdown">
            @foreach($portfolios as $portfolio)
                <a class="dropdown-item" href="{{ asset('storage/' . $portfolio->resume_path) }}" target="_blank">
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
                <!-- Search Icon Button -->
                <button id="search-toggle-NA" type="button">
                    <i class="bi bi-search"></i>
                </button>

                <!-- Search Input -->
                <input type="text" class="form-control_NA search-input-NA" id="search-input-NA" placeholder="Search...">

                <!-- Loading Indicator -->
                <div id="loading-indicator" style="display: none;">Loading...</div>

                <!-- Search Results -->
                <div id="search-results"></div>
            </div>
        </div>
    </div>
</nav>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // --- Script for searchIcon toggle ---
        const searchToggleNA = document.getElementById("search-toggle-NA");
        const searchInputNA = document.getElementById("search-input-NA");
        const searchResults = document.getElementById("search-results");
        const loadingIndicator = document.getElementById("loading-indicator");
        let searchTimeout;
        let cache = {};
        let selectedIndex = -1; // To track the selected search result

        if (searchToggleNA && searchInputNA && searchResults && loadingIndicator) {
            // Toggle search input visibility
            searchToggleNA.addEventListener("click", function (e) {
                e.preventDefault();
                searchInputNA.classList.toggle("show");

                if (searchInputNA.classList.contains("show")) {
                    searchInputNA.focus();
                } else {
                    searchInputNA.value = "";
                    searchResults.innerHTML = "";
                }
            });

            // Debounced input listener
            searchInputNA.addEventListener("input", debounce(function () {
                let query = searchInputNA.value.trim();

                if (query.length > 2) {
                    if (cache[query]) {
                        displaySearchResults(cache[query]);
                    } else {
                        loadingIndicator.style.display = "block";
                        fetchSearchResults(query);
                    }
                } else {
                    searchResults.innerHTML = "";
                    loadingIndicator.style.display = "none";
                }
            }, 300));

            // Fetch results from the backend
            function fetchSearchResults(query) {
                fetch(`/search?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        cache[query] = data;
                        displaySearchResults(data);
                        loadingIndicator.style.display = "none";
                    })
                    .catch(error => {
                        console.error("Error fetching search results:", error);
                        searchResults.innerHTML = "<p class='search-no-results'>Error fetching results. Please try again.</p>";
                        loadingIndicator.style.display = "none";
                    });
            }

            // Render search results
            function displaySearchResults(data) {
                searchResults.innerHTML = "";
                selectedIndex = -1; // Reset selected result on new input

                // Check if any data is returned
                if (!data || !Object.values(data).some(array => array.length > 0)) {
                    searchResults.innerHTML = "<p class='search-no-results'>No results found.</p>";
                } else {
                    let ul = document.createElement("ul");
                    ul.classList.add("search-results-list");

                    // Display products, categories, subcategories, etc.
                    createSearchResultItems(data, ul);

                    searchResults.appendChild(ul);

                    // See All button
                    let seeAllDiv = document.createElement("div");
                    seeAllDiv.classList.add("see-all-container");
                    seeAllDiv.innerHTML = `<a href="/search_results?query=${encodeURIComponent(searchInputNA.value.trim())}" class="see-all-link">See All</a>`;
                    searchResults.appendChild(seeAllDiv);
                }
            }

            function createSearchResultItems(data, container) {
                // Iterate and append each result type (products, categories, etc.)
                ["products", "productCategories", "productSubcategories", "projects", "projectsCategories"].forEach(type => {
                    data[type].forEach(item => {
                        let li = document.createElement("li");
                        li.classList.add("search-result-item");
                        li.innerHTML = `
                            <a href="/${type.slice(0, -1)}/${item.id}" class="search-result-link">
                                <strong>${item.title_en || item.name_en || item.name_ar || item.project_name}</strong><br>
                                <span>${item.title_ar || item.name_ar || item.description || ""}</span>
                            </a>`;
                        container.appendChild(li);
                    });
                });
            }

            // Redirect on Enter for full results page
            searchInputNA.addEventListener("keydown", function (e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                    if (selectedIndex >= 0) {
                        let selectedItem = searchResults.querySelectorAll(".search-result-item")[selectedIndex];
                        window.location.href = selectedItem.querySelector("a").href;
                    } else {
                        const query = searchInputNA.value.trim();
                        if (query.length > 2) {
                            window.location.href = `/search_results?query=${encodeURIComponent(query)}`;
                        }
                    }
                } else if (e.key === "ArrowDown") {
                    e.preventDefault();
                    navigateResults(1);
                } else if (e.key === "ArrowUp") {
                    e.preventDefault();
                    navigateResults(-1);
                }
            });

            // Navigate through results using arrow keys
            function navigateResults(direction) {
                let items = searchResults.querySelectorAll(".search-result-item");
                if (items.length === 0) return;

                selectedIndex = (selectedIndex + direction + items.length) % items.length; // Wrap around
                items.forEach((item, index) => {
                    item.classList.toggle("selected", index === selectedIndex);
                });
            }

            // Hide results when clicking outside
            document.addEventListener("click", function (event) {
                if (!searchResults.contains(event.target) && !searchInputNA.contains(event.target)) {
                    searchResults.innerHTML = "";
                }
            });

            // Debounce function to limit frequent requests
            function debounce(func, delay) {
                return function () {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(func, delay);
                };
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
    if (window.innerWidth < 992) {
        // Toggle top-level dropdowns
        document.querySelectorAll('.dropdown-submenu > a').forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                const submenu = this.nextElementSibling;

                // Close all other submenus at same level
                const siblingSubmenus = this.closest('.dropdown-menu').querySelectorAll('.dropdown-menu');
                siblingSubmenus.forEach(s => {
                    if (s !== submenu) s.classList.remove('show');
                });

                submenu?.classList.toggle('show');
            });
        });
    }
});
</script>
