<div id="carouselExample" class="carousel slide home-slider TS" data-bs-ride="carousel" aria-label="Top Slider">
    <style>
        /* Custom Styles for TS (Top Slider) */
        .TS {
            /* If you want to give it a specific container size or background */
            width: 100%;
            background-color: #f0f0f0; /* Light background */
        }

        .TS .carousel-inner {
            height: 100%;
        }

        .TS .carousel-item {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            transition: transform 0.7s cubic-bezier(0.42, 0, 0.58, 1), opacity 0.7s ease-in-out;
            will-change: transform, opacity;
            width: 100%;
            height: 75vh; /* Default height for the Top Slider */
            position: relative;
        }

        .TS .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .TS .carousel-item .unique-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* Dark overlay */
        }

        .TS .carousel-item .unique-content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80%;
            padding: 0 1rem;
        }

        .TS .slider-description {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            opacity: 0.8;
        }

        .TS .slider-title {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 0.5rem;
        }

        /* Responsive Adjustments for Top Slider */
        @media (max-width: 768px) {
            .TS .slider-title {
                font-size: 1.5rem;
            }

            .TS .slider-description {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .TS .slider-title {
                font-size: 1.25rem;
            }

            .TS .slider-description {
                font-size: 0.875rem;
            }

            .TS .carousel-item {
                height: 50vh;
            }
        }
    </style>

    <div class="carousel-inner home-carousel-inner">
        @foreach($sliders as $index => $slider)
            @php
                $locale = app()->getLocale();
                $title = $locale === 'ar' ? $slider->title_ar : $slider->title_en;
                $description = $locale === 'ar' ? $slider->description_ar : $slider->description_en;
            @endphp

            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                 style="background-image: url('{{ asset('' . $slider->image) }}');">
                <div class="unique-overlay"></div>
                <div class="unique-content text-white text-center">
                    @if($description)
                        <p class="slider-description">{{ $description }}</p>
                    @endif

                    <hr class="slider-line">

                    @if($title)
                        <h2 class="slider-title">{{ $title }}</h2>
                    @endif

                    @if($slider->url)
                        <a href="{{ $slider->url }}" class="btn btn-primary mt-3">{{ __('Learn More') }}</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev"
            aria-label="{{ __('Previous') }}">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next"
            aria-label="{{ __('Next') }}">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>
