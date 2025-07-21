@extends('front.layouts.app')
<x-front-slider />
@section('content')

<div class="container mt-5">
    {{-- <x-banner pageTitle="{{ __('search_results') }}" /> --}}

    @if(session('error'))
        <div class="alert alert-danger text-center mt-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="container">
        <h2 class="search-title text-center mb-4 mt-2">
            {{ __('search_results_for', ['query' => $query]) }}
        </h2>

        @if($products->isEmpty())
            <div class="no-results text-center">
                <p>{{ __('no_products_found') }}</p>
            </div>
        @else
            <div class="products-list">
                @foreach($products as $product)
                    <div class="product-item">
                        <div class="product-card">
                            <a class="text-dark" href="{{ route('product.show', $product->id) }}">
                                <div class="product-image">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/placeholder.png') }}"
                                         alt="{{ $product->name_en }}" class="img-fluid lazyload">
                                </div>
                            </a>
                            <div class="product-info">
                                <h3 class="product-title">{{ $product->name_en }}</h3>
                                <p class="product-description">{{ Str::limit($product->description_en, 120) }}</p>
                                <p class="product-date">{{ __('published_on') }} {{ $product->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/lazysizes@5.2.1/lazysizes.min.js" async></script>

    <style>
        .search-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
            letter-spacing: 1px;
        }

        .products-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .product-item {
            flex: 0 0 calc(33.333% - 20px);
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .product-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .product-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-image {
            width: 100%;
            height: 250px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }

        .product-info {
            padding: 20px;
            flex-grow: 1;
            background-color: #f9f9f9;
        }

        .product-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 12px;
        }

        .product-description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .product-date {
            font-size: 0.9rem;
            color: #aaa;
        }

        .pagination {
            margin-top: 30px;
            text-align: center;
        }

        .pagination a {
            text-decoration: none;
            color: #007bff;
            font-size: 1rem;
            margin: 0 5px;
        }

        .pagination a:hover {
            color: #0056b3;
        }

        @media (max-width: 1024px) {
            .product-item {
                flex: 0 0 calc(50% - 20px);
            }
        }

        @media (max-width: 768px) {
            .product-item {
                flex: 0 0 100%;
            }

            .search-title {
                font-size: 2rem;
            }
        }

        .lazyload {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .lazyload.loaded {
            opacity: 1;
        }
    </style>
@endsection
