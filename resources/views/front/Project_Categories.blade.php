<x-front-slider />
@extends('front.layouts.app')

@section('content')

<div class="container mt-5">

    <style>
        .category-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A;
            text-align: center;
            margin-bottom: 40px;
        }

        .category-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
        }

        .category-item p {
            margin-top: 10px;
            font-size: 18px;
            font-weight: 500;
            color: #00704A;
        }

        .category-description {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
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
        }

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
    </style>

    <h2 class="category-title">Project Categories</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        @forelse ($categories as $category)
            <div class="col text-center category-item">
                <a href="{{ route('projects-category.show', $category->id) }}">

                    <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/placeholder.png') }}"
                         alt="{{ $category->name_en }}" class="img-fluid mb-2" style="max-height: 180px;">
                    <p>{{ $category->name_en }}</p>
                </a>
                {{-- @if ($category->description_en)
                    <div class="category-description">{{ Str::limit($category->description_en, 100) }}</div>
                @endif --}}
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No project categories available at the moment.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection
