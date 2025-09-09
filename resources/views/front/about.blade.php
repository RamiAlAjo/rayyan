@extends('front.layouts.app')
<x-front-slider />

@section('content')

<div class="container mt-5">
    <div class="section-spacing" style="text-align: left; margin-top: 5rem;">
        @php
            $locale = app()->getLocale();
            // Get the title and description based on the current locale
            $title = $locale === 'ar' ? $aboutUs->about_us_title_ar : $aboutUs->about_us_title_en;
            $description = $locale === 'ar' ? $aboutUs->about_us_description_ar : $aboutUs->about_us_description_en;
        @endphp

        @if(isset($title) && $title)
            <h2 class="about-title" style="font-size: 36px; margin: 8.5px 0; color: green;">
                {!! $title !!}
            </h2>
        @else
            <h2 class="about-title" style="font-size: 36px; margin: 8.5px 0; color: green;">
                {!! __('default_about_us_title') !!} <!-- Fallback with raw HTML if needed -->
            </h2>
        @endif

        @if(isset($description) && $description)
            <p class="mt-4" style="font-size: 20px;">
                {!! $description !!}
            </p>
        @else
            <p class="mt-4" style="font-size: 20px;">
                {!! __('default_about_us_description') !!} <!-- Fallback with raw HTML if needed -->
            </p>
        @endif
    </div>
</div>

@endsection
