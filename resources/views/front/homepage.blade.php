<x-front-slider />
@extends('front.layouts.app')
@section('content')

<!-- ================== CATEGORY SECTION ================== -->
<div class="container mt-5">

    <!-- Category Section Styles -->
    <style>
        .category-row {
            display: flex;
            flex-wrap: nowrap; /* Keep items in one row on desktop */
            overflow-x: auto;
            gap: 20px;
            padding-bottom: 10px;
            min-height: 300px;
            background-color: transparent;
            background-image: none;
            scroll-behavior: smooth; /* Smooth scrolling */
            -webkit-overflow-scrolling: touch; /* Better momentum scroll on iOS */
        }

        /* Scrollbar styling */
        .category-row::-webkit-scrollbar {
            height: 8px;
        }

        .category-row::-webkit-scrollbar-thumb {
            background-color: #00704A;
            border-radius: 4px;
        }

        /* Category item styles */
        .category-item {
            flex: 0 0 auto; /* Fix width */
            text-align: center;
            background-color: #e6f4ea;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 112, 74, 0.2);
            transition: background-color 0.3s ease, transform 0.3s ease;
            min-height: 280px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 220px; /* Limit max width for consistency */
        }

        /* Hover effects */
        .category-item:hover {
            background-color: #c9e7d2;
            transform: translateY(-5px);
        }

        .category-item:hover img {
            transform: scale(1.1);
        }

        /* Responsive adjustments */
        /* Large tablets and smaller desktops */
        @media (max-width: 1200px) {
            .category-row {
                gap: 15px;
            }
            .category-item {
                max-width: 200px;
                min-height: 260px;
            }
            .category-item img {
                max-width: 130px;
            }
        }

        /* Tablets and small laptops */
        @media (max-width: 992px) {
            .category-row {
                flex-wrap: wrap; /* Wrap items on smaller screens */
                justify-content: center;
                gap: 15px;
                min-height: auto; /* Remove min height for flexibility */
            }
            .category-item {
                min-width: 180px;
                max-width: 220px;
                min-height: auto;
            }
            .category-item img {
                max-width: 120px;
            }
        }

        /* Large phones and small tablets */
        @media (max-width: 768px) {
            .category-title {
                font-size: 28px;
                margin-bottom: 20px;
            }
            .category-item p {
                font-size: 16px;
            }
            .category-row {
                flex-direction: column; /* Stack vertically on phones */
                gap: 10px;
                min-height: auto;
            }
            .category-item {
                max-width: 100%;
                min-height: auto;
                padding: 20px;
            }
            .category-item img {
                max-width: 100px;
            }
        }

        /* Small phones */
        @media (max-width: 576px) {
            .category-title {
                font-size: 24px;
                margin-bottom: 15px;
            }
            .category-item p {
                font-size: 14px;
            }
            .category-item img {
                max-width: 80px;
            }
        }

        /* Ensure smooth scroll behavior for horizontal scrollable row */
        .d-flex.overflow-auto::-webkit-scrollbar {
            height: 8px;
        }

        .d-flex.overflow-auto::-webkit-scrollbar-thumb {
            background-color: #00704A;
            border-radius: 4px;
        }

        /* Add fade-in effect for images */
        .category-item img {
            transition: transform 0.3s ease-in-out;
        }

        /* Ensure vertical alignment and scaling on smaller screens */
        .category-item img {
            object-fit: cover;
            transition: transform 0.3s ease-in-out, scale 0.3s ease-in-out;
        }

        /* Adjust title and layout for extra-small screens */
        @media (max-width: 400px) {
            .category-title {
                font-size: 22px;
            }

            .category-item {
                padding: 15px;
            }

            .category-item img {
                max-width: 70px;
            }
        }
    </style>
</div>

<!-- ================== CATEGORY SECTION ================== -->
<div class="container mt-5">
    <div class="d-flex flex-nowrap overflow-auto gap-3 pb-3" style="min-height: 220px;">
        @foreach($categories as $category)
            <div class="card text-center" style="width: 10rem; min-width: 10rem;">
                <div class="card-body">
                    <p class="card-text fw-semibold mb-2">{{ $category->name_en }}</p>
                </div>
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" class="card-img-bottom" alt="{{ $category->name_en }}" loading="lazy">
                @else
                    <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" class="card-img-bottom" alt="{{ $category->name_en }}" loading="lazy">
                @endif
            </div>
        @endforeach
    </div>
</div>

<!-- ================== FEATURES SECTION ================== -->
<div class="features-section">
    <div class="container">
        <div class="row text-center text-md-start">

            @foreach ($features->chunk(2) as $chunk)
                <div class="col-md-4">
                    @foreach ($chunk as $feature)
                        <div class="feature-icon">
                            <img src="{{ asset('storage/' . $feature->image) }}" alt="{{ $feature->title_en }}">
                            <span>{{ $feature->title_en }}</span>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
</div>

<!-- Features Section Styles -->
<style>
     .features-section {
      background-color: #fff;
      padding: 50px 0;
    }

    .feature-icon {
      display: flex;
      align-items: center;
      margin-bottom: 25px;
    }

    .feature-icon img {
      width: 30px;
      margin-right: 15px;
    }

    .feature-icon span {
      color: #222;
      font-size: 16px;
    }
</style>

<!-- ================== WELCOME SECTION ================== -->
<div class="section-spacing" style="background-color: #f4f4f4; padding: 50px 20px; width: 100%; box-sizing: border-box;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; text-align: left;">
        <h2 style="font-size: 36px; margin: 8.5px 0; color: #00704A;">
            {{ $aboutUs->about_us_title_en ?? 'Welcome to Our Site' }}
        </h2>
        <p class="mt-4" style="font-size: 20px; color: #333;">
            {!! nl2br(e($aboutUs->about_us_description_en ?? "We're excited to have you here! Whether you're looking for top-notch products, services, or just exploring, you've come to the right place. Our team is dedicated to providing you with the best experience and delivering high-quality results. We're committed to making your journey with us smooth, enjoyable, and fulfilling. Thank you for visiting, and we look forward to serving you!")) !!}
        </p>

        <!-- View All Button -->
        <div style="display: flex; justify-content: center; margin-top: 30px;">
            <a href="{{ route('about.index') }}" style="
                padding: 12px 25px;
                background-color: #00704A;
                color: white;
                font-weight: 600;
                text-decoration: none;
                border-radius: 5px;
                width: 100%;
                max-width: 100%;
                text-align: center;
            ">
                View All
            </a>
        </div>
    </div>
</div>

<style>
     .welcome-section {
      background-color: #e5e5e5;
      padding: 60px 20px;
      text-align: center;
    }

    .welcome-section h2 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    .welcome-section p {
      max-width: 800px;
      margin: auto;
      font-size: 18px;
      line-height: 1.6;
    }

    .view-all-btn {
      margin-top: 30px;
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 12px 30px;
      font-size: 16px;
      font-weight: 500;
    }
</style>

<!-- ================== CAROUSEL & STATS ================== -->
<div class="striped-background">
    <div class="container">

       <!-- Carousel -->
<div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($products->chunk(3) as $chunkIndex => $productChunk)
            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                <div class="row g-3">
                    @foreach ($productChunk as $product)
                        <div class="col-md-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="d-block w-100" alt="{{ $product->name_en }}">
                            @else
                                <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" class="d-block w-100" alt="{{ $product->name_en }}">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

</div>
    <!-- Stats -->
<div class="row stats mt-5">
    @foreach($stats as $stat)
        <div class="col-6 col-md-3 stat-item">
            <h3>{{ $stat->value }}+</h3>
            <p>{{ app()->getLocale() === 'ar' ? $stat->title_ar : $stat->title_en }}</p>
        </div>
    @endforeach
</div>
    </div>
</div>

<!-- Carousel & Stats Styles -->
<style>
    .carousel-item img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        border-radius: 5px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
    }

    .stats {
        margin-top: 30px;
    }

    .stat-item {
        text-align: center;
    }

    .stat-item h3 {
        font-weight: 700;
        color: #00704A;
    }

    .stat-item p {
        margin: 0;
        font-size: 18px;
        color: #00704A;
    }
</style>

<!-- ================== PRODUCT SECTION ================== -->
<div class="container mt-5">

    <h2 class="mb-4 text-center fw-bold" style="color: #00704A;">Our Products</h2>

    <div class="d-flex flex-nowrap overflow-auto gap-3 pb-3" style="min-height: 250px;">
        @foreach($products as $product)
            <div class="card text-center border-0" style="width: 10rem; min-width: 10rem;">
                <img src="{{ $product->image ?: 'https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png' }}" class="card-img-top" alt="{{ $product->name_en }}" loading="lazy">
                <div class="card-body">
                    <p class="card-text fw-semibold mb-0">{{ $product->name_en }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- ================== SERVICES SECTION ================== -->
<div class="services-section">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: #00704A;">Our Services</h2>
        <div class="row text-center text-md-start">
            @foreach($services->chunk(2) as $chunk)
                <div class="col-md-4">
                    @foreach($chunk as $service)
                        <div class="service-icon">
                            <img src="{{ asset($service->image ?: 'https://via.placeholder.com/150') }}" alt="{{ $service->name_en }}">
                            <span>{{ $service->name_en }}</span>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

  <!-- Services Section Styles -->
  <style>
    .services-section {
      background-color: #fff;
      padding: 50px 0;
    }

    .service-icon {
      display: flex;
      align-items: center;
      margin-bottom: 25px;
    }

    .service-icon img {
      width: 30px;
      margin-right: 15px;
    }

    .service-icon span {
      color: #222;
      font-size: 16px;
    }
  </style>

<!-- ================== PROJECTS SECTION ================== -->
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold" style="color: #00704A;">Our Projects</h2>

    <div class="d-flex flex-nowrap overflow-auto gap-3 pb-3" style="min-height: 250px;">
        @foreach ($projects as $project)
            <div class="card text-center border-0" style="width: 10rem; min-width: 10rem;">
                <img src="{{ asset('storage/' . $project->image) }}"
                     class="card-img-top"
                     alt="{{ $project->name_en }}"
                     loading="lazy">
                <div class="card-body">
                    <p class="card-text fw-semibold mb-0">{{ $project->name_en }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- View All Button -->
    <div style="display: flex; justify-content: center; margin-top: 30px;">
        <a href="/projects" style="
            padding: 12px 25px;
            background-color: #00704A;
            color: white;
            font-weight: 600;
            text-decoration: none;
            border-radius: 5px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        ">
            View All Projects
        </a>
    </div>
</div>

<!-- ================== NEWS SECTION ================== -->
<div class="container py-5 news-section">
    <h2 class="text-center mb-5 news-title">News</h2>
    <div class="row g-4">

        <!-- News Items -->
        @foreach ($news as $item)
            <div class="col-md-6 {{ $loop->last ? 'col-12' : '' }}">
                <div class="news-card {{ $item->status == 'active' ? 'active-card' : '' }} p-4 h-100 text-center">
                    <h5 class="news-heading {{ $item->status == 'active' ? 'text-success' : '' }}">{{ $item->title_en }}</h5>
                    @if (!empty($item->description_en))
                        <p class="news-text">{{ $item->description_en }}</p>
                    @endif
                    @if (!empty($item->image))
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title_en }}" class="img-fluid mt-3" style="max-height: 90px;">
                    @else
                        <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="Placeholder Image" class="img-fluid mt-3" style="max-height: 90px;">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- News Section Styles -->
<style>
    .news-title {
        color: #00704A;
        font-weight: bold;
        font-size: 36px;
    }

    .news-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 112, 74, 0.1);
    }

    .dark-card {
        background-color: #2f4a3d;
        color: #fff;
    }

    .news-heading {
        font-size: 18px;
        font-weight: 600;
    }

    .news-text {
        font-size: 15px;
        line-height: 1.5;
        color: inherit;
    }

    @media (max-width: 576px) {
        .news-title {
            font-size: 26px;
        }

        .news-heading {
            font-size: 16px;
        }

        .news-text {
            font-size: 14px;
        }
    }
</style>

<!-- Main container for the page content -->
<div class="container mt-5 ">
    <style>
        .contact-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-section {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .contact-box {
            background-color: #115d18;
            color: #fff;
            padding: 25px;
            border-radius: 8px;
            height: 100%;
        }

        .contact-box h4 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .contact-box p {
            margin-bottom: 10px;
        }

        .company-logos img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .contact-title {
                font-size: 28px;
            }

            .form-section, .contact-box {
                padding: 20px;
            }
        }
    </style>

    <h2 class="contact-title">Contact Us</h2>

    <div class="row g-4">
        <!-- Left Contact Form -->
        <div class="col-lg-8">
            <div class="form-section">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Your full name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Your email address">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="5" placeholder="Your message..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Send Message</button>
                </form>
            </div>
        </div>

        <!-- Right Contact Information -->
        <div class="col-lg-4">
            <div class="contact-box">
                <h4>Get In Touch</h4>
                <p><strong>Factory Address</strong><br>
                    Amman – Jordan – Abu Alanda Industrial Area<br>
                    Al-Hazam Street<br><br>
                    Saudi Arabia – Al-Malaz
                </p>

                <p><strong>Contact</strong><br>
                    Tel: 0096264161787 / 009625643888<br>
                    Fax: 0096264165081 / 009625543882<br>
                    Email: admin@rayyan.com.jo
                </p>

                <p class="mt-3">Member of Munir Sukhtian International</p>

                <div class="company-logos">
                    <img src="Career.png" alt="Company Logo">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
