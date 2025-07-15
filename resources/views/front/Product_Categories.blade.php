<x-front-slider />
@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
<div class="container mt-5">

    <style>
        .category-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A; /* Dark green */
            text-align: center;
            margin-bottom: 40px;
        }

        .category-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
        }

        .category-item p {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 500;
            color: #00704A;
        }

        @media (max-width: 576px) {
            .category-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .category-item p {
                font-size: 16px;
            }
        }
    </style>

    <h2 class="category-title text-center mb-4">Product Categories</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        @forelse ($categories as $category)
            @if ($category->status === 'active')
               <div class="col text-center category-item">
<a href="{{ route('product-category.show', $category->id) }}">

        <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/placeholder.png') }}"
             alt="{{ $category->name_en }}" class="img-fluid mb-2" style="max-height: 180px;">
        <p>{{ $category->name_en }}</p>
    </a>
</div>

            @endif
        @empty
            <div class="col-12 text-center">
                <p>No categories available at the moment.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection
