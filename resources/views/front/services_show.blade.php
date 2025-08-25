<x-front-slider />
@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
<div class="container mt-5">

    <style>
        .service-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A; /* Dark green */
            text-align: center;
            margin-bottom: 40px;
        }

        .service-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
        }

        .service-item p {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 500;
            color: #00704A;
        }

        /* Responsive spacing for small devices */
        @media (max-width: 576px) {
            .service-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .service-item p {
                font-size: 16px;
            }
        }
    </style>

    <!-- Service Info Section -->
    <h2 class="service-title text-center mb-4">
        {{ app()->getLocale() === 'ar' ? $service->name_ar : $service->name_en }}
    </h2>

    <div class="service-details">
        <div class="service-info">
            <h3>{{ app()->getLocale() === 'ar' ? $service->name_ar : $service->name_en }}</h3>
            <p class="description">
                {{ app()->getLocale() === 'ar' ? ($service->description_ar ?? __('No description available.')) : ($service->description_en ?? __('No description available.')) }}
            </p>
        </div>
    </div>

    <!-- Display 3 Other Services (or Products) -->
    <h2 class="service-title text-center mb-4">
        {{ __('Other Services') }}
    </h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        @forelse ($otherServices as $otherService)
            <div class="col text-center service-item">
                <a href="{{ route('services.show', $otherService->slug) }}">
                    <img src="{{ $otherService->image ? asset('/' . $otherService->image) : asset('images/placeholder.png') }}"
                         alt="{{ app()->getLocale() === 'ar' ? $otherService->name_ar : $otherService->name_en }}"
                         class="img-fluid mb-2" style="max-height: 180px;">
                    <p>{{ app()->getLocale() === 'ar' ? $otherService->name_ar : $otherService->name_en }}</p>
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>{{ __('No other services available at the moment.') }}</p>
            </div>
        @endforelse
    </div>

</div>

@endsection
