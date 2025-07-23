<style>
    .navbar {
        position: fixed;
        top: 0;
        z-index: 999;
        width: 100%;
        font-size: 18px;
        background-color: white;
        padding: 0.5rem 1rem;
    }

    .navbar-brand img {
        height: auto;
        max-height: 100px;
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

    .navbar-logo {
    max-height: 80px;
    width: auto;
    object-fit: contain;
}
@media (max-width: 992px) {
    .navbar-logo {
        max-height: 60px;
    }

}
    /* Enhanced Search Container Design */
        .search-container-NA {
            position: relative;
            display: flex;
            align-items: center;
            margin-left: auto;
            margin-right: 20px; /* Space between the icon and other elements */
            flex-direction: column; /* Stack items vertically */
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
            margin-top: 10px; /* Space below icon */
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

        /* Mobile / Responsive adjustments */
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
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top mt-4">
    <div class="container">
        <a class="navbar-brand" href="/home">
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
        <li class="nav-item">
            <a class="nav-link nav-link-NA {{ Request::is('product-category') ? 'active' : '' }}" href="{{ route('product-category.index') }}">{{ __('products') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-NA {{ Request::is('projects-category') ? 'active' : '' }}" href="{{ route('projects-category.index') }}">{{ __('projects') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-NA {{ Request::is('portfolio') ? 'active' : '' }}" href="{{ route('portfolio.index') }}">{{ __('company_profile') }}</a>
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
                            searchResults.innerHTML = "<p class='search-no-results'>Error fetching results.</p>";
                            loadingIndicator.style.display = "none";
                        });
                }

                // Render search results
                function displaySearchResults(data) {
                    searchResults.innerHTML = "";

                    // Check if any data is returned
                    if (data.products.length === 0 && data.productCategories.length === 0 && data.productSubcategories.length === 0 && data.projects.length === 0 && data.projectsCategories.length === 0 && data.categories.length === 0) {
                        searchResults.innerHTML = "<p class='search-no-results'>No results found.</p>";
                    } else {
                        let ul = document.createElement("ul");
                        ul.classList.add("search-results-list");

                        // Display products
                        data.products.forEach(product => {
                            let li = document.createElement("li");
                            li.classList.add("search-result-item");
                            li.innerHTML = `
                                <a href="/products/${product.id}" class="search-result-link">
                                    <strong>EN:</strong> ${product.title_en}<br>
                                    <strong>AR:</strong> ${product.title_ar}
                                </a>`;
                            ul.appendChild(li);
                        });

                        // Display product categories
                        data.productCategories.forEach(category => {
                            let li = document.createElement("li");
                            li.classList.add("search-result-item");
                            li.innerHTML = `
                                <a href="/categories/${category.id}" class="search-result-link">
                                    <strong>Category:</strong> ${category.name_en}
                                </a>`;
                            ul.appendChild(li);
                        });

                        // Display product subcategories
                        data.productSubcategories.forEach(subcategory => {
                            let li = document.createElement("li");
                            li.classList.add("search-result-item");
                            li.innerHTML = `
                                <a href="/subcategories/${subcategory.id}" class="search-result-link">
                                    <strong>Subcategory:</strong> ${subcategory.name_en}
                                </a>`;
                            ul.appendChild(li);
                        });

                        // Display projects
                        data.projects.forEach(project => {
                            let li = document.createElement("li");
                            li.classList.add("search-result-item");
                            li.innerHTML = `
                                <a href="/projects/${project.id}" class="search-result-link">
                                    <strong>Project:</strong> ${project.name_en}
                                </a>`;
                            ul.appendChild(li);
                        });

                        // Display project categories
                        data.projectsCategories.forEach(projectCategory => {
                            let li = document.createElement("li");
                            li.classList.add("search-result-item");
                            li.innerHTML = `
                                <a href="/project-categories/${projectCategory.id}" class="search-result-link">
                                    <strong>Project Category:</strong> ${projectCategory.name_en}
                                </a>`;
                            ul.appendChild(li);
                        });

                        searchResults.appendChild(ul);

                        // See All button
                        let seeAllDiv = document.createElement("div");
                        seeAllDiv.classList.add("see-all-container");
                        seeAllDiv.innerHTML = `<a href="/search_results?query=${encodeURIComponent(searchInputNA.value.trim())}" class="see-all-link">See All</a>`;
                        searchResults.appendChild(seeAllDiv);
                    }
                }

                // Redirect on Enter for full results page
                searchInputNA.addEventListener("keydown", function (e) {
                    if (e.key === "Enter") {
                        e.preventDefault();
                        const query = searchInputNA.value.trim();
                        if (query.length > 2) {
                            window.location.href = `/search_results?query=${encodeURIComponent(query)}`;
                        }
                    }
                });

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
    </script>

