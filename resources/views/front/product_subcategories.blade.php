<x-front-slider />
@extends('front.layouts.app')

@section('content')

<!-- Main container -->
<div class="container mt-5">

    <style>
        .subcategory-section {
            padding-bottom: 60px;
        }

        .category-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A; /* Dark green */
            text-align: center;
            margin-bottom: 40px;
        }

        .subcategory-item {
            transition: transform 0.3s ease;
        }

        .subcategory-item:hover {
            transform: translateY(-5px);
        }

        .subcategory-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
            margin: 0 auto;
        }

        .subcategory-name {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 600;
            color: #00704A;
        }

        .subcategory-description {
            font-size: 14px;
            color: #6c757d; /* Bootstrap muted color */
            padding: 0 10px;
        }

        @media (max-width: 576px) {
            .category-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .subcategory-name {
                font-size: 16px;
            }

            .subcategory-description {
                font-size: 13px;
            }
        }
    </style>

    <div class="subcategory-section">
        <h2 class="category-title">{{ __('Product Subcategories') }}</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
            @forelse ($subcategories as $subcategory)
                @if ($subcategory->status === 'active')
                    <div class="col text-center subcategory-item">
                        <a href="{{ route('product-subcategory.show', $subcategory->id) }}" class="text-decoration-none">
                            <img src="{{ $subcategory->image ? asset('/' . $subcategory->image) : asset('images/placeholder.png') }}"
                                 alt="{{ app()->getLocale() === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}"
                                 class="img-fluid mb-2" style="max-height: 180px;">

                            <p class="subcategory-name">
                                {{ app()->getLocale() === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}
                            </p>

                            @php
                                $description = app()->getLocale() === 'ar' ? $subcategory->description_ar : $subcategory->description_en;
                            @endphp

                            @if (!empty($description))
                                <p class="subcategory-description">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($description), 100) }}
                                </p>
                            @endif
                        </a>
                    </div>
                @endif
            @empty
                <div class="col-12 text-center">
                    <p>{{ __('No subcategories available at the moment.') }}</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
