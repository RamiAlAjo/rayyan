<x-front-slider />
@extends('front.layouts.app')

@section('content')

<!-- Main container -->
<div class="container mt-5">

    <style>
        .category-section {
            padding-bottom: 60px;
        }

        .category-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A; /* Dark green */
            text-align: center;
            margin-bottom: 40px;
        }

        .category-item {
            transition: transform 0.3s ease;
        }

        .category-item:hover {
            transform: translateY(-5px);
        }

        .category-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
            margin: 0 auto;
        }

        .category-name {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 600;
            color: #00704A;
        }

        .category-description {
            font-size: 14px;
            color: #6c757d; /* Bootstrap muted color */
            padding: 0 10px;
        }

        @media (max-width: 576px) {
            .category-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .category-name {
                font-size: 16px;
            }

            .category-description {
                font-size: 13px;
            }
        }
    </style>

    <div class="category-section">
        <h2 class="category-title">{{ __('Our Products') }}</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
            @forelse ($categories as $category)
                @if ($category->status === 'active')
                    <div class="col text-center category-item">
                        <a href="{{ route('product-category.show', $category->id) }}" class="text-decoration-none">
                            <img src="{{ $category->image ? asset('/' . $category->image) : asset('images/placeholder.png') }}"
                                 alt="{{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}"
                                 class="img-fluid mb-2" style="max-height: 180px;">

                            <p class="category-name">
                                {{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}
                            </p>

                            @php
                                $description = app()->getLocale() === 'ar' ? $category->description_ar : $category->description_en;
                            @endphp

                            @if (!empty($description))
                                <p class="category-description">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($description), 100) }}
                                </p>
                            @endif
                        </a>
                    </div>
                @endif
            @empty
                <div class="col-12 text-center">
                    <p>{{ __('No categories available at the moment.') }}</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($categories->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $categories->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</div>

@endsection
