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

    .search-container {
        position: relative;
    }

    .search-input {
        display: none;
        position: absolute;
        top: 40px;
        left: 0;
        width: 250px;
        border: 1px solid #ccc;
        padding: 5px 10px;
        border-radius: 5px;
        background: white;
        z-index: 1000;
        transition: all 0.3s ease-in-out;
    }

    .search-container i {
        font-size: 20px;
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

        .search-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 10px;
        }

        .search-input {
            position: relative;
            width: 100%;
            max-width: 300px;
            top: auto;
            left: auto;
            font-size: 14px;
            margin-top: 10px;
        }

        .d-flex {
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .search-container i {
            font-size: 18px;
        }
    }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top mt-4">
    <div class="container">
        <a class="navbar-brand" href="/home">
            <img src="assets/Logo 2025 rami.svg" alt="Rayyan">
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
                    <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
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
            <form action="/search" method="GET" class="d-flex align-items-center gap-3">
                <div class="search-container me-2">
                    <i class="bi bi-search" id="searchIcon" style="cursor: pointer;"></i>
                    <input type="text" class="search-input" id="searchInput" name="query" placeholder="Search for apartments...">
                </div>
            </form>
        </div>
    </div>
</nav>

<!-- Search Script -->
<script>
    const searchIcon = document.getElementById("searchIcon");
    const searchInput = document.getElementById("searchInput");

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
</script>
