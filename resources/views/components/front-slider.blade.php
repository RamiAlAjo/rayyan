<div id="carouselExample" class="carousel slide home-slider TS" data-bs-ride="carousel" aria-label="Top Slider">
    <div class="carousel-inner home-carousel-inner">
        @foreach($sliders as $index => $slider)
            @php
                $locale = app()->getLocale();
                $title = $locale === 'ar' ? $slider->title_ar : $slider->title_en;
                $description = $locale === 'ar' ? $slider->description_ar : $slider->description_en;
            @endphp

            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                 style="background-image: url('{{ asset($slider->image) }}');">
                <div class="unique-overlay"></div>
                <div class="unique-content container">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-8 col-md-10">
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

<style>
    /* ================= TOP SLIDER STYLES (TS) ================== */
.TS {
    width: 100%;
    background-color: #f0f0f0;
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
    height: 75vh;
    position: relative;
}

.TS .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.TS .unique-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

.TS .unique-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    color: #fff;
}

.TS .slider-title {
    font-size: 2.5rem;
    font-weight: bold;
    margin-top: 1rem;
}

.TS .slider-description {
    font-size: 1.25rem;
    opacity: 0.85;
}

/* ================= RESPONSIVE ADJUSTMENTS ================= */
@media (max-width: 992px) {
    .TS .slider-title {
        font-size: 2rem;
    }

    .TS .slider-description {
        font-size: 1.1rem;
    }

    .TS .carousel-item {
        height: 65vh;
    }
}

@media (max-width: 768px) {
    .TS .slider-title {
        font-size: 1.6rem;
    }

    .TS .slider-description {
        font-size: 1rem;
    }

    .TS .carousel-item {
        height: 55vh;
    }
}

@media (max-width: 576px) {
    .TS .slider-title {
        font-size: 1.3rem;
    }

    .TS .slider-description {
        font-size: 0.9rem;
    }

    .TS .carousel-item {
        height: 45vh;
    }
}

</style>
