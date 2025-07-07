{{-- @include('front.layouts.pages_slider') --}}
<x-front-slider />

@extends('front.layouts.app')

@section('content')

<div class="container mt-5">
    <div class="section-spacing" style="text-align: left; margin-top: 5rem;">
        @php
            $locale = app()->getLocale();
            $title = $locale === 'ar' ? $aboutUs->about_us_title_ar : $aboutUs->about_us_title_en;
            $description = $locale === 'ar' ? $aboutUs->about_us_description_ar : $aboutUs->about_us_description_en;
        @endphp

        @if($title)
            <h2 style="font-size: 36px; margin: 8.5px 0; color: green;">
                {{ $title }}
            </h2>
        @endif

        @if($description)
            <p class="mt-4" style="font-size: 20px;">
                {{ $description }}
            </p>
        @endif
    </div>
</div>


@endsection
