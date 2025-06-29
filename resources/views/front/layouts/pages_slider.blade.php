<style>
    /* Home slider styles */
    .home-slider {
        width: 100%;
        height: 75vh; /* Ensure consistent height for the carousel */
        overflow: hidden; /* Prevent overflow */
    }

    #carouselExample {
        /* height: 100%; */
    }

    .home-carousel-inner {
        height: 100%;
    }

    /* Improved smoothness for carousel items */
    .carousel-item {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        transition: transform 0.7s cubic-bezier(0.42, 0, 0.58, 1), opacity 0.7s ease-in-out; /* Improved transition */
        will-change: transform, opacity; /* Performance optimization */
        width: 100%;
        height: 75vh; /* Make the banner full height of the viewport */
        position: relative;
    }

    .carousel-item img {
        width: 100%; /* Ensure the image takes up the full width */
        height: 100%; /* Ensure the image takes up the full height */
        object-fit: cover; /* Ensures the image fills the container without stretching */
    }

    /* Full width banner */
    .custom-body,
    .custom-html {
        margin: 0;
        padding: 0;
    }

    .carousel-item .unique-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.2);
    }

    .carousel-item .unique-content {
        position: relative;
        z-index: 1;
        color: white;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80%;
    }

    /* Removed h1 and p styling since they're removed from markup */

    /* Smooth transition for carousel item when active */
    .carousel-item-next,
    .carousel-item-prev,
    .carousel-item.active {
        transition: transform 0.7s cubic-bezier(0.42, 0, 0.58, 1), opacity 0.7s ease-in-out;
        /* Smooth transitions */
    }

    /* Adding transition effects to the carousel controls */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        transition: transform 0.3s ease-in-out;
    }

    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
        transform: scale(1.1);
        /* Slight hover effect */
    }
</style>
</head>

<body class="custom-body">

<!-- Bootstrap Carousel with home-slider class -->
<div id="carouselExample" class="carousel slide home-slider" data-bs-ride="carousel">
    <div class="home-carousel-inner">

        <!-- Static Carousel Items -->
        <div class="carousel-item active"
            style="background-image: url('https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png');">
            <div class="unique-overlay"></div>
            <div class="unique-content">
                <!-- Content removed as requested -->
            </div>
        </div>

        <div class="carousel-item"
            style="background-image: url('https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png');">
            <div class="unique-overlay"></div>
            <div class="unique-content">
                <!-- Content removed as requested -->
            </div>
        </div>

        <div class="carousel-item"
            style="background-image: url('https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png');">
            <div class="unique-overlay"></div>
            <div class="unique-content">
                <!-- Content removed as requested -->
            </div>
        </div>

    </div>

    <!-- Carousel controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev"
        aria-label="Previous">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next"
        aria-label="Next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>
