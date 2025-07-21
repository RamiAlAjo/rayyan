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

/* SEARCH BAR STYLES */
.search-container-NA {
    display: flex;
    flex-direction: column; /* Stack vertically */
    align-items: flex-start; /* Align items to the left */
    position: relative;
}

.form-control_NA {
    padding: 12px;
    border: 1px solid #4CAF50;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

.form-control_NA:focus {
    border-color: #07d82a;
    outline: none;
    box-shadow: 0 0 5px rgba(7, 216, 42, 0.5);
    background-color: #f0f8f4;
}

.search-input-NA {
    width: 0;
    opacity: 0;
    transition: width 0.3s ease, opacity 0.3s ease;
    border: 1px solid #ccc;
    border-radius: 20px;
    padding: 8px 15px;
    font-size: 1rem;
    background: #f8f9fa;
    outline: none;
    display: none;
    margin-top: 10px; /* Add spacing below icon */
}

.search-input-NA.show {
    display: block;
    width: 220px;
    opacity: 1;
}

#search-toggle-NA {
    font-size: 1.5rem;
    border: none;
    background: none;
    padding: 5px;
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease;
}

#search-toggle-NA:hover {
    color: #07d82a;
    transform: scale(1.1);
}

#search-toggle-NA:focus {
    outline: 3px solid #07d82a;
    border-radius: 5px;
}

#search-results {
    background: white;
    position: static; /* Previously 'absolute' – now flows naturally below input */
    width: 100%;
    max-width: 220px;
    max-height: 250px;
    overflow-y: auto;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    display: none;
    margin-top: 5px;
    z-index: 1000;
    transition: all 0.3s ease-in-out;
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
    padding: 12px;
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
    padding: 10px;
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

@media (max-width: 991px) {
    .search-container-NA {
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 10px;
        padding: 5px;
    }

    .search-input-NA {
        width: 100%;
        max-width: 100%;
        text-align: center;
        margin-top: 10px;
    }

    #search-toggle-NA {
        font-size: 1.6rem;
        padding: 8px;
        margin-top: 10px;
    }
}

@media (max-width: 767px) {
    .search-container-NA {
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 10px;
        padding: 5px;
    }

    .search-input-NA {
        width: 90% !important;
        font-size: 1rem;
    }

    #search-results {
        right: 0;
        max-width: 100%;
        width: 90%;
        margin-top: 10px;
    }

    .search-result-item {
        padding: 12px;
    }
}


</style>
</head>
<body>

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
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.index') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product-category.index') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects-category.index') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portfolio.index') }}">Company Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq.index') }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('career.index') }}">Careers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
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


            <!-- Language Toggle -->
            {{-- <div class="language-toggle-NA">
                <img id="language-flag-NA" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Flag_of_Jordan.svg/320px-Flag_of_Jordan.svg.png" alt="Language Flag" class="language-flag-NA" onclick="toggleFlag()">
                <span class="language-text-NA">Arabic</span>
            </div>

         --}}

        </div>
    </div>
</nav>

<!-- Combined Search Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // --- Script for searchIcon toggle ---
        const searchIcon = document.getElementById("searchIcon");
        const searchInput = document.getElementById("searchInput");

        if (searchIcon && searchInput) {
            searchIcon.addEventListener("click", function (event) {
                if (searchInput.style.display === "none" || searchInput.style.display === "") {
                    searchInput.style.display = "block";
                    searchInput.focus();
                } else {
                    searchInput.style.display = "none";
                }
                event.stopPropagation();
            });

            document.addEventListener("click", function (event) {
                if (!searchInput.contains(event.target) && event.target !== searchIcon) {
                    searchInput.style.display = "none";
                }
            });

            searchInput.addEventListener("keypress", function (event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    this.closest("form").submit();
                }
            });
        }

        // --- Script for advanced live search ---
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

            // Fetch results
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
            function displaySearchResults(products) {
                searchResults.innerHTML = "";

                if (products.length === 0) {
                    searchResults.innerHTML = "<p class='search-no-results'>No results found.</p>";
                } else {
                    let ul = document.createElement("ul");
                    ul.classList.add("search-results-list");

                    products.forEach(product => {
                        let li = document.createElement("li");
                        li.classList.add("search-result-item");
                        li.innerHTML = `
                            <a href="/products/${product.id}" class="search-result-link">
                                <strong>EN:</strong> ${product.title_en}<br>
                                <strong>AR:</strong> ${product.title_ar}
                            </a>`;
                        ul.appendChild(li);
                    });

                    searchResults.appendChild(ul);

                    let seeAllDiv = document.createElement("div");
                    seeAllDiv.classList.add("see-all-container");
                    seeAllDiv.innerHTML = `<a href="/search_results?query=${encodeURIComponent(searchInputNA.value.trim())}" class="see-all-link">See All</a>`;
                    searchResults.appendChild(seeAllDiv);
                }
            }

            // Redirect on Enter
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

            function debounce(func, delay) {
                return function () {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(func, delay);
                };
            }
        }

        // --- Language toggle flag ---
        function toggleFlag() {
            const flagImg = document.getElementById("language-flag-NA");
            const flagText = document.querySelector(".language-text-NA");

            if (flagImg && flagText) {
                if (flagImg.src.includes("Flag_of_Jordan")) {
                    flagImg.src = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_Kingdom.svg/800px-Flag_of_the_United_Kingdom.svg.png";
                    flagText.textContent = "English";
                } else {
                    flagImg.src = "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Flag_of_Jordan.svg/320px-Flag_of_Jordan.svg.png";
                    flagText.textContent = "Arabic";
                }
            }
        }

        window.toggleFlag = toggleFlag;
    });
</script>
