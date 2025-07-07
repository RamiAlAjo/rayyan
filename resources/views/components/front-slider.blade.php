<div id="carouselExample" class="carousel slide home-slider" data-bs-ride="carousel">
    <style>
        .home-slider {
            width: 100%;
            height: 75vh;
            overflow: hidden;
        }

        .home-carousel-inner {
            height: 100%;
        }

        .carousel-item {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            transition: transform 0.7s cubic-bezier(0.42, 0, 0.58, 1), opacity 0.7s ease-in-out;
            will-change: transform, opacity;
            width: 100%;
            height: 75vh;
            position: relative;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

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
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80%;
            padding: 0 1rem;
        }

        .slider-description {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .slider-line {
            width: 60px;
            height: 2px;
            background-color: white;
            border: none;
            margin: 0.5rem auto;
        }

        .slider-title {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 0.5rem;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            transition: transform 0.3s ease-in-out;
        }

        .carousel-control-prev-icon:hover,
        .carousel-control-next-icon:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .slider-title {
                font-size: 1.5rem;
            }

            .slider-description {
                font-size: 1rem;
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
