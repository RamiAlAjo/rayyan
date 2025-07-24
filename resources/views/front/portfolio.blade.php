<x-front-slider />
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

   <h2 class="profile-title">{{ __('Company Profile') }}</h2>

<div class="pdf-container">
    <iframe src="{{ asset('pdfs/rayyan-company-profile.pdf') }}" type="application/pdf">
        {{ __('This browser does not support PDFs.') }}
        {{ __('Please') }} <a href="{{ asset('pdfs/rayyan-company-profile.pdf') }}">{{ __('download the PDF') }}</a> {{ __('instead.') }}
    </iframe>
</div>


@endsection
