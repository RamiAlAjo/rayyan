@include('front.layouts.pages_slider')
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

    <h2 class="product-title">Products</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        <!-- Product 1 -->
        <div class="col text-center product-item">
            <img src="Product.png" alt="Green Houses">
            <p>Green Houses</p>
        </div>
        <!-- Product 2 -->
        <div class="col text-center product-item">
            <img src="Product.png" alt="Poultry Houses">
            <p>Poultry Houses</p>
        </div>
        <!-- Product 3 -->
        <div class="col text-center product-item">
            <img src="Product.png" alt="Fish Farms">
            <p>Fish Farms</p>
        </div>
        <!-- Product 4 -->
        <div class="col text-center product-item">
            <img src="Product.png" alt="Irrigation">
            <p>Irrigation</p>
        </div>
        <!-- Product 5 -->
        <div class="col text-center product-item">
            <img src="Product.png" alt="Landscaping">
            <p>Landscaping</p>
        </div>
    </div>
</div>

@endsection
