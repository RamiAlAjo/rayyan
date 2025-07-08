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

<h2 class="product-title text-center mb-4">Products</h2>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
    @forelse ($products as $product)
        <div class="col text-center product-item">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/placeholder.png') }}"
                 alt="{{ $product->name_en }}" class="img-fluid mb-2" style="max-height: 180px;">
            <p>{{ $product->name_en }}</p>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>No products available at the moment.</p>
        </div>
    @endforelse
</div>
</div>

@endsection
