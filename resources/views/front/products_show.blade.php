<x-front-slider />
@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
<div class="container mt-5">

    <style>
        .product-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A; /* Dark green */
            text-align: center;
            margin-bottom: 40px;
        }

        .product-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
        }

        .product-item p {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 500;
            color: #00704A;
        }

        /* Responsive spacing for small devices */
        @media (max-width: 576px) {
            .product-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .product-item p {
                font-size: 16px;
            }
        }
    </style>

    <h2 class="product-title text-center mb-4">{{ $product->name_en }}</h2>

    <!-- Product Info Section -->
    <div class="product-details">
        <div class="product-info">
            <h3>{{ $product->name_en }}</h3>
            <p class="description">{{ $product->description_en ?? 'No description available.' }}</p>
        </div>
    </div>

    <!-- Display 3 Clickable Products from the Same Subcategory -->
    <h2 class="product-title text-center mb-4">Other Products in This Subcategory</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        @forelse ($otherProducts as $otherProduct)
            <div class="col text-center product-item">
                <!-- Make the product clickable -->
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ $otherProduct->image ? asset('storage/' . $otherProduct->image) : asset('images/placeholder.png') }}"
                         alt="{{ $otherProduct->name_en }}" class="img-fluid mb-2" style="max-height: 180px;">
                    <p>{{ $otherProduct->name_en }}</p>
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No other products available in this subcategory at the moment.</p>
            </div>
        @endforelse
    </div>

</div>

@endsection
