@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
<div class="container mt-5">
    <style>
        .profile-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A;
            text-align: center;
            margin-bottom: 30px;
        }

        .pdf-container {
            width: 100%;
            height: 80vh;
            border: 2px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        .pdf-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        @media (max-width: 768px) {
            .profile-title {
                font-size: 28px;
            }

            .pdf-container {
                height: 70vh;
            }
        }
    </style>

    @if($portfolio)
    <!-- Portfolio Title -->
    <h2 class="profile-title my-4">
        {{ app()->getLocale() == 'ar' ? $portfolio->portfolio_name_ar : $portfolio->portfolio_name_en }}
    </h2>

    <!-- PDF Container -->
    <div class="pdf-container">
        @if($portfolio->resume_path && file_exists(public_path($portfolio->resume_path)))
            <iframe src="{{ asset($portfolio->resume_path) }}" type="application/pdf">
                {{ __('This browser does not support PDFs.') }}
                {{ __('Please') }} <a href="{{ asset($portfolio->resume_path) }}">{{ __('download the PDF') }}</a> {{ __('instead.') }}
            </iframe>
        @else
            <div class="text-center p-5">
                <p class="text-danger">{{ __('No resume available to display.') }}</p>
            </div>
        @endif
    </div>
@else
    <div class="text-center p-5">
        <p class="text-danger">{{ __('Portfolio not found.') }}</p>
    </div>
@endif


@endsection
