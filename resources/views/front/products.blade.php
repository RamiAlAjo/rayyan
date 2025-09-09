<x-front-slider />
@extends('front.layouts.app')

@section('content')

<div class="container mt-5">

    <style>
        .product-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A;
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

        @media (max-width: 576px) {
            .product-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .product-item p {
                font-size: 16px;
            }
        }

         /* Dark green pagination styling */
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

 <!-- Category Title -->
<h2 class="product-title text-center mb-4">
    {{ app()->getLocale() === 'ar' ? $categoryNameAr . ' ' . __('Products') : $categoryName . ' ' . __('Products') }}
</h2>

<!-- Products Grid -->
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
    @forelse ($products as $product)
        <div class="col text-center product-item">
            <a href="{{ route('product.show', $product->id) }}">
                <img src="{{ $product->image ? asset($product->image) : asset('images/placeholder.png') }}"
                     alt="{{ app()->getLocale() === 'ar' ? $product->name_ar : $product->name_en }}"
                     class="img-fluid mb-2" style="max-height: 180px;">
                <p>{{ app()->getLocale() === 'ar' ? $product->name_ar : $product->name_en }}</p>
            </a>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>{{ __('No products available at the moment.') }}</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $products->links('pagination::bootstrap-5') }}
</div>


@endsection
