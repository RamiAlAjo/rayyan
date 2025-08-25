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
    const searchToggle = document.getElementById("search-toggle-NA");
    const searchInput = document.getElementById("search-input-NA");
    const searchResults = document.getElementById("search-results");
    const loadingSpinner = document.getElementById("loading-indicator");

    let cache = {};
    let selectedIndex = -1;
    let searchTimeout;

    if (!searchToggle || !searchInput || !searchResults || !loadingSpinner) return;

    // --- Toggle Search Input ---
    searchToggle.addEventListener("click", function (e) {
        e.preventDefault();
        searchInput.classList.toggle("show");

        if (searchInput.classList.contains("show")) {
            searchInput.focus();
        } else {
            resetSearch();
        }
    });

    // --- Search Input Listener with Debounce ---
    searchInput.addEventListener("input", debounce(handleSearchInput, 300));

    function handleSearchInput() {
        const query = searchInput.value.trim();

        if (query.length <= 2) {
            resetResults();
            return;
        }

        if (cache[query]) {
            displayResults(cache[query]);
        } else {
            showLoading(true);
            fetch(`/search?query=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    cache[query] = data;
                    displayResults(data);
                })
                .catch(() => {
                    searchResults.innerHTML = `<p class="search-no-results">Error fetching results. Please try again.</p>`;
                })
                .finally(() => {
                    showLoading(false);
                });
        }
    }

    // --- Display Results ---
    function displayResults(data) {
        searchResults.innerHTML = "";
        selectedIndex = -1;

        const hasResults = data && Object.values(data).some(arr => arr.length > 0);
        if (!hasResults) {
            searchResults.innerHTML = `<p class="search-no-results">No results found.</p>`;
            return;
        }

        const ul = document.createElement("ul");
        ul.classList.add("search-results-list");

        const types = ["products", "productCategories", "productSubcategories", "projects", "projectsCategories"];
        types.forEach(type => {
            (data[type] || []).forEach(item => {
                const li = document.createElement("li");
                li.className = "search-result-item";
                li.innerHTML = `
                    <a href="/${type.slice(0, -1)}/${item.id}" class="search-result-link">
                        <strong>${item.title_en || item.name_en || item.name_ar || item.project_name}</strong><br>
                        <span>${item.title_ar || item.name_ar || item.description || ""}</span>
                    </a>
                `;
                ul.appendChild(li);
            });
        });

        searchResults.appendChild(ul);

        const seeAll = document.createElement("div");
        seeAll.classList.add("see-all-container");
        seeAll.innerHTML = `<a href="/search_results?query=${encodeURIComponent(searchInput.value.trim())}" class="see-all-link">See All</a>`;
        searchResults.appendChild(seeAll);
    }

    // --- Handle Keyboard Navigation ---
    searchInput.addEventListener("keydown", function (e) {
        const items = searchResults.querySelectorAll(".search-result-item");
        if (!items.length) return;

        if (e.key === "ArrowDown" || e.key === "ArrowUp") {
            e.preventDefault();
            const dir = e.key === "ArrowDown" ? 1 : -1;
            selectedIndex = (selectedIndex + dir + items.length) % items.length;
            items.forEach((item, i) => item.classList.toggle("selected", i === selectedIndex));
        } else if (e.key === "Enter") {
            e.preventDefault();
            if (selectedIndex >= 0) {
                const link = items[selectedIndex].querySelector("a");
                if (link) window.location.href = link.href;
            } else {
                const query = searchInput.value.trim();
                if (query.length > 2) {
                    window.location.href = `/search_results?query=${encodeURIComponent(query)}`;
                }
            }
        }
    });

    // --- Hide Results on Outside Click ---
    document.addEventListener("click", function (e) {
        if (!searchResults.contains(e.target) && !searchInput.contains(e.target)) {
            resetResults();
        }
    });

    function debounce(func, delay) {
        return function () {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(func, delay);
        };
    }

    function resetSearch() {
        searchInput.value = "";
        resetResults();
    }

    function resetResults() {
        searchResults.innerHTML = "";
        showLoading(false);
        selectedIndex = -1;
    }

    function showLoading(state) {
        loadingSpinner.style.display = state ? "block" : "none";
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (window.innerWidth < 992) {
        document.querySelectorAll('.dropdown-submenu > a').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const submenu = this.nextElementSibling;

                this.closest('.dropdown-menu').querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== submenu) menu.classList.remove('show');
                });

                submenu?.classList.toggle('show');
            });
        });
    }
});
</script>

