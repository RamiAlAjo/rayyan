<x-front-slider />
@extends('front.layouts.app')
@section('content')

<!-- ================== CATEGORY SECTION ================== -->
<div class="container mt-5">
    <div class="row d-flex flex-nowrap overflow-auto gap-3 pb-3" style="min-height: 220px;">
        @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card category-card text-center"
                     style="width: 100%; border-radius: 10px; box-shadow: 0 2px 6px rgba(0, 112, 74, 0.2); transition: transform 0.3s ease;">
                    <div class="card-body">
                        <p class="card-text fw-semibold mb-2 text-dark" title="{{ $category->name_en }}">
                            {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}
                        </p>
                    </div>
                    <img
                        src="{{ $category->image ? asset('storage/' . $category->image) : 'https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png' }}"
                        class="card-img-bottom category-img"
                        alt="{{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}"
                        title="{{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name_en }}"
                        loading="lazy"
                    >
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- ================== CATEGORY SECTION STYLES ================== -->
<style>
    /* Category Card Styling */
    .category-card {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        background-color: #e6f4ea;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Hover Effect on Card */
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 112, 74, 0.2);
    }

    /* Category Image Styling */
    .category-img {
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
        height: 150px; /* Ensuring consistent height for images */
    }

    .category-card:hover .category-img {
        transform: scale(1.1);
    }

    /* Scrollable Row */
    .d-flex.overflow-auto {
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
    }

    /* Scrollbar Styling */
    .d-flex.overflow-auto::-webkit-scrollbar {
        height: 8px;
    }

    .d-flex.overflow-auto::-webkit-scrollbar-thumb {
        background-color: #00704A;
        border-radius: 4px;
    }

    /* Responsive Design Adjustments */
    @media (max-width: 1200px) {
        .category-card {
            max-width: 200px;
        }
    }

    @media (max-width: 992px) {
        .d-flex.overflow-auto {
            flex-wrap: wrap; /* Wrap items for smaller screens */
        }
        .category-card {
            width: 100%;
            max-width: 220px;
        }
    }

    @media (max-width: 768px) {
        .category-card {
            padding: 15px;
        }
        .category-card .card-body {
            padding: 10px;
        }
        .category-img {
            max-width: 100px;
        }
    }

    @media (max-width: 576px) {
        .category-card {
            padding: 10px;
        }
        .category-img {
            max-width: 80px;
        }
    }
</style>


<!-- ================== FEATURES SECTION ================== -->
<div class="features-section">
    <div class="container">
        <div class="row text-center text-md-start">

            @foreach ($features->chunk(2) as $chunk)
                <div class="col-md-4">
                    @foreach ($chunk as $feature)
                        <div class="feature-icon">
                            <img src="{{ asset('storage/' . $feature->icon_path) }}" alt="{{ $feature->title_en }}">
                            <span>{{ app()->getLocale() == 'ar' ? $feature->title_ar : $feature->title_en }}</span>
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
            {{ app()->getLocale() == 'ar' ? ($aboutUs->about_us_title_ar ?? __('welcome_to_our_site')) : ($aboutUs->about_us_title_en ?? __('welcome_to_our_site')) }}
        </h2>
        <p class="mt-4" style="font-size: 20px; color: #333;">
            {!! nl2br(e(app()->getLocale() == 'ar' ? ($aboutUs->about_us_description_ar ?? __('welcome_description')) : ($aboutUs->about_us_description_en ?? __('welcome_description')))) !!}
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
                {{ __('view_all') }}
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

<!-- ================== GALLERY CAROUSEL ================== -->
<div class="striped-background">
    <div class="container">
        <!-- Carousel -->
        <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($photos->chunk(3) as $chunkIndex => $photoChunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="row g-3">
                            @foreach ($photoChunk as $photo)
                                @if($photo->status === 'active') <!-- Check if the photo is active -->
                                    <div class="col-md-4">
                                        @if($photo->images)
                                            <img src="{{ asset('storage/' . $photo->images) }}" class="d-block w-100" alt="{{ app()->getLocale() == 'ar' ? $photo->image_title_ar : $photo->image_title_en }}" style="max-height: 400px; object-fit: cover;">
                                        @else
                                            <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" class="d-block w-100" alt="{{ __('placeholder_image') }}" style="max-height: 400px; object-fit: cover;">
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</div>


   <!-- ================== STATS SECTION ================== -->
<div class="row stats mt-3">
    @foreach($stats as $stat)
        <div class="col-6 col-md-3 stat-item">
            <h3>{{ $stat->value }}+</h3>
            <p>{{ app()->getLocale() == 'ar' ? $stat->title_ar : $stat->title_en }}</p>
        </div>
    @endforeach
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

    /* Set the max height for carousel images */
.carousel-inner img {
    max-height: 400px; /* Set your desired max height here */
    object-fit: cover; /* This ensures the image will cover the space without stretching */
    width: 100%; /* Ensure the width stays 100% */
}

</style>

<!-- ================== PRODUCT SECTION ================== -->
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold" style="color: #00704A;">{{ __('products') }}</h2>

    <div class="d-flex flex-nowrap overflow-auto gap-3 pb-3" style="min-height: 250px;">
        @foreach($products as $product)
            @if($product->status === 'active') <!-- Filter only active products -->
                <div class="card text-center border-0" style="width: 10rem; min-width: 10rem;">
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        class="card-img-top"
                        alt="{{ app()->getLocale() == 'ar' ? $product->name_ar : $product->name_en }}"
                        loading="lazy"
                        style="object-fit: cover; height: 150px; width: 100%;"
                    >
                    <div class="card-body">
                        <p class="card-text fw-semibold mb-0">
                            {{ app()->getLocale() == 'ar' ? $product->name_ar : $product->name_en }}
                        </p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>


<!-- ================== SERVICES SECTION ================== -->
<div class="services-section">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="color: #00704A;">{{ __('services') }}</h2>
        <div class="row text-center text-md-start">
            @foreach($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="service-icon">
                        <img
                            src="{{ $service->image ? asset('storage/' . $service->image) : 'https://via.placeholder.com/150' }}"
                            alt="{{ app()->getLocale() == 'ar' ? $service->name_ar : $service->name_en }}"
                            class="img-fluid mb-2"
                            width="60"
                        >
                        <span class="d-block fw-semibold">{{ app()->getLocale() == 'ar' ? $service->name_ar : $service->name_en }}</span>
                    </div>
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
    <h2 class="mb-4 text-center fw-bold" style="color: #00704A;">{{ __('projects') }}</h2>

    <div class="d-flex flex-nowrap overflow-auto gap-3 pb-3" style="min-height: 250px;">
        @foreach ($projects as $project)
            <div class="card text-center border-0" style="width: 10rem; min-width: 10rem;">
                <img src="{{ asset('storage/' . $project->image) }}"
                     class="card-img-top"
                     alt="{{ app()->getLocale() == 'ar' ? $project->name_ar : $project->name_en }}"
                     loading="lazy">
                <div class="card-body">
                    <p class="card-text fw-semibold mb-0">{{ app()->getLocale() == 'ar' ? $project->name_ar : $project->name_en }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- View All Button -->
    <div style="display: flex; justify-content: center; margin-top: 30px;">
        {{-- <a href="{{ route('projects.index') }}" style="
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
            {{ __('view_all') }}
        </a> --}}
    </div>
</div>

<!-- ================== NEWS CAROUSEL ================== -->
<div class="striped-background py-5">
    <div class="container">
        <h2 class="text-center mb-5 news-title">{{ __('news') }}</h2>

        @if($news->count())
            <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($news->chunk(2) as $chunkIndex => $newsChunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="row g-4">
                                @foreach ($newsChunk as $item)
                                    <div class="col-md-6">
                                        <div class="news-card p-4 h-100 text-center {{ $item->status == 'active' ? 'active-card' : '' }}">
                                            <h5 class="news-heading {{ $item->status == 'active' ? 'text-success' : '' }}">
                                                {{ app()->getLocale() == 'ar' ? ($item->title_ar ?? $item->title_en) : $item->title_en }}
                                            </h5>

                                            @php
                                                $description = app()->getLocale() == 'ar' ? $item->description_ar : $item->description_en;
                                            @endphp

                                            @if (!empty($description))
                                                <p class="news-text">{{ $description }}</p>
                                            @endif

                                            @if (!empty($item->image))
                                                <img src="{{ asset('storage/' . $item->image) }}"
                                                     alt="{{ app()->getLocale() == 'ar' ? ($item->title_ar ?? $item->title_en) : $item->title_en }}"
                                                     class="img-fluid mt-3"
                                                     style="max-height: 90px;">
                                            @else
                                                <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png"
                                                     alt="{{ __('placeholder_image') }}"
                                                     class="img-fluid mt-3"
                                                     style="max-height: 90px;">
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

               <!-- Controls BELOW carousel -->
<div class="carousel-controls-below text-center mt-4">
    <button class="carousel-arrow-btn me-2" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
        <span class="triangle-left"></span>
    </button>
    <button class="carousel-arrow-btn" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
        <span class="triangle-right"></span>
    </button>
</div>

            </div>
        @else
            <p class="text-center text-muted">{{ __('No news available.') }}</p>
        @endif
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
        transition: transform 0.2s ease-in-out;
    }

    .news-card:hover {
        transform: translateY(-5px);
    }

    .news-heading {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .news-text {
        font-size: 15px;
        line-height: 1.5;
        color: inherit;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
    }

    .striped-background {
        background: repeating-linear-gradient(
            45deg,
            #f8f9fa,
            #f8f9fa 10px,
            #ffffff 10px,
            #ffffff 20px
        );
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

        .carousel-arrow-btn {
        background: none;
        border: none;
        outline: none;
        cursor: pointer;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .triangle-left,
    .triangle-right {
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
    }

    .triangle-left {
        border-width: 10px 14px 10px 0;
        border-color: transparent #00704A transparent transparent;
    }

    .triangle-right {
        border-width: 10px 0 10px 14px;
        border-color: transparent transparent transparent #00704A;
    }

    .carousel-arrow-btn:hover .triangle-left,
    .carousel-arrow-btn:hover .triangle-right {
        filter: brightness(1.2);
    }

    .carousel-controls-below {
    display: flex;
    justify-content: center;
    gap: 16px;
}

.triangle-left,
.triangle-right {
    transition: transform 0.2s ease-in-out;
}

.carousel-arrow-btn:hover .triangle-left {
    transform: translateX(-3px);
}

.carousel-arrow-btn:hover .triangle-right {
    transform: translateX(3px);
}


</style>


<!-- ================== CONTACT US SECTION ================== -->
<div class="container mt-5">
    <h2 class="contact-title">{{ __('contact_us') }}</h2>

    <div class="row g-4">
        <!-- Contact Form -->
        <div class="col-lg-8">
            <div class="form-section">
                <form>
                    <div class="mb-3">
                        <label class="form-label">{{ __('full_name') }}</label>
                        <input type="text" class="form-control" placeholder="{{ __('your_full_name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('email') }}</label>
                        <input type="email" class="form-control" placeholder="{{ __('your_email_address') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('message') }}</label>
                        <textarea class="form-control" rows="5" placeholder="{{ __('your_message') }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">{{ __('send_message') }}</button>
                </form>
            </div>
        </div>

        <!-- Contact Info Box -->
        <div class="col-lg-4">
            <div class="contact-box">
                <h4>{{ __('get_in_touch') }}</h4>

                <p>
                    <strong>{{ __('address') }}</strong><br>
                    {!! nl2br(e(app()->getLocale() == 'ar' ? ($settings->address_ar ?? 'عمان – الأردن – منطقة أبو علندا الصناعية<br>شارع الحزام') : ($settings->address ?? 'Amman – Jordan – Abu Alanda Industrial Area<br>Al-Hazam Street'))) !!}
                </p>

                <p>
                    <strong>{{ __('contact') }}</strong><br>
                    @php
                        $phones = json_decode($settings->phone ?? '[]', true);
                    @endphp

                    @if (!empty($phones))
                        {{ __('tel') }}: {{ implode(' / ', $phones) }}<br>
                    @endif

                    @if (!empty($settings->fax))
                        {{ __('fax') }}: {{ $settings->fax }}<br>
                    @endif

                    @if (!empty($settings->contact_email))
                        {{ __('email') }}: {{ $settings->contact_email }}
                    @endif
                </p>

                @if (!empty($settings->carrers_email))
                    <p><strong>{{ __('careers') }}:</strong> {{ $settings->carrers_email }}</p>
                @endif

                <p class="mt-3">{{ __('member_of_munir_sukhtian') }}</p>

                <div class="company-logos">
                    <img src="{{ asset('Career.png') }}" alt="{{ __('company_logo') }}">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ================== CONTACT STYLES ================== -->
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
    background-image: url('{{ asset('contact background.svg') }}');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    color: #fff;
    padding: 25px;
    border-radius: 8px;
    height: 100%;
    position: relative;
    z-index: 1;
    overflow: hidden;
}

.contact-box::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.2); /* Less dark, more background visible */
    z-index: -1;
    border-radius: 8px;
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

@endsection
