<x-front-slider />
@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
<div class="container mt-5">

    <style>
        .projects-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A; /* Dark green */
            text-align: center;
            margin-bottom: 40px;
        }

        .project-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
        }

        .project-item p {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 500;
            color: #00704A;
        }

        /* Responsive spacing for small devices */
        @media (max-width: 576px) {
            .projects-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .project-item p {
                font-size: 16px;
            }
        }
    </style>

    <h2 class="projects-title">Our Projects</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
        <!-- Project 1 -->
        <div class="col text-center project-item">
            <img src="Product.png" alt="Jordan Agriculture">
            <p>Jordan Agriculture Project</p>
        </div>
        <!-- Project 2 -->
        <div class="col text-center project-item">
            <img src="Product.png" alt="Saudi Poultry">
            <p>Saudi Poultry Expansion</p>
        </div>
        <!-- Project 3 -->
        <div class="col text-center project-item">
            <img src="Product.png" alt="Irrigation Network">
            <p>Irrigation Network Setup</p>
        </div>
        <!-- Project 4 -->
        <div class="col text-center project-item">
            <img src="Product.png" alt="Greenhouse Modernization">
            <p>Greenhouse Modernization</p>
        </div>
        <!-- Project 5 -->
        <div class="col text-center project-item">
            <img src="Product.png" alt="Landscaping Design">
            <p>Landscaping Design</p>
        </div>
    </div>
</div>

@endsection
