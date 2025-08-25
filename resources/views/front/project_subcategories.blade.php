<x-front-slider />
@extends('front.layouts.app')

@section('content')

<div class="container mt-5">

    <style>
        .category-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A; /* Dark green */
            text-align: center;
            margin-bottom: 40px;
        }

        .category-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 112, 74, 0.2); /* Add box-shadow on hover */
        }

        .category-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
            margin: 0 auto;
            border-radius: 10px; /* Rounded corners for the images */
        }

        .category-item p {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 600;
            color: #00704A;
        }

        .category-description {
            font-size: 14px;
            color: #6c757d; /* Bootstrap muted color */
            padding: 0 10px;
            margin-top: 5px;
        }

        /* Pagination Styles */
        .pagination .page-link {
            color: #00704A;
        }

        .pagination .page-link:hover {
            background-color: #00704A;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #00704A;
            border-color: #00704A;
            color: white;
        }

        .pagination .page-link:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 112, 74, 0.25);
        }

        @media (max-width: 576px) {
            .category-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .category-item p {
                font-size: 16px;
            }

            .category-description {
                font-size: 13px;
            }

            .category-item img {
                max-width: 120px;
            }
        }
    </style>

    <!-- Subcategory Title -->
    <h2 class="category-title text-center mb-4">
        {{ $categoryName }} {{ __('Subcategories') }}
    </h2>

    <!-- Display Subcategories -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        @forelse ($subcategories as $subcategory)
            <div class="col text-center category-item">
                <a href="{{ route('projects-subcategory.show', $subcategory->id) }}" class="text-decoration-none">
                    <img src="{{ $subcategory->image ? asset('storage/' . $subcategory->image) : asset('images/placeholder.png') }}"
                         alt="{{ app()->getLocale() === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}"
                         class="img-fluid mb-2" style="max-height: 180px;">
                    <p class="fw-bold">
                        {{ app()->getLocale() === 'ar' ? $subcategory->name_ar : $subcategory->name_en }}
                    </p>

                    @php
                        $description = app()->getLocale() === 'ar' ? $subcategory->description_ar : $subcategory->description_en;
                    @endphp

                    @if (!empty($description))
                        <div class="category-description">
                            {{ \Illuminate\Support\Str::limit(strip_tags($description), 100) }}
                        </div>
                    @endif
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>{{ __('No subcategories available at the moment.') }}</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $subcategories->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection
