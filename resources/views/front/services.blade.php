@include('front.layouts.pages_slider')
@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
<div class="container mt-5">

    <style>
        body {
            background-color: #e5e5e5; /* Light gray background */
            padding: 20px;
        }

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

    <h2 class="services-title">Our Services</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        <!-- Service 1 -->
        <div class="col text-center service-item">
            <img src="Product.png" alt="Consulting">
            <p>Consulting</p>
        </div>
        <!-- Service 2 -->
        <div class="col text-center service-item">
            <img src="Product.png" alt="Design & Planning">
            <p>Design & Planning</p>
        </div>
        <!-- Service 3 -->
        <div class="col text-center service-item">
            <img src="Product.png" alt="Installation">
            <p>Installation</p>
        </div>
        <!-- Service 4 -->
        <div class="col text-center service-item">
            <img src="Product.png" alt="Maintenance">
            <p>Maintenance</p>
        </div>
        <!-- Service 5 -->
        <div class="col text-center service-item">
            <img src="Product.png" alt="Technical Support">
            <p>Technical Support</p>
        </div>
    </div>
</div>

@endsection
