<x-front-slider />
@extends('front.layouts.app')

@section('content')

<div class="container mt-5">

    <style>
        .services-title {
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
            .services-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .service-item p {
                font-size: 16px;
            }
        }
    </style>

    <h2 class="services-title">{{ __('Our Services') }}</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        @foreach($services as $service)
            @php
                $locale = app()->getLocale();
                $name = $locale === 'ar' ? $service->name_ar : $service->name_en;
                $imagePath = $service->image ? asset('storage/' . $service->image) : asset('default-service.png');
            @endphp

            <div class="col text-center service-item">
                <img src="{{ $imagePath }}" alt="{{ $name }}">
                <p>{{ $name }}</p>
            </div>
        @endforeach
    </div>
</div>

@endsection
