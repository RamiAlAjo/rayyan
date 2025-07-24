<x-front-slider />
@extends('front.layouts.app')

@section('content')

<div class="container mt-5">
    <style>
        .faq-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A;
            text-align: center;
            margin-bottom: 40px;
        }

        .accordion-button {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #00704A;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-button:not(.collapsed) {
            background-color: #d4edda;
            color: #004d2c;
        }

        .accordion-body {
            background-color: #ffffff;
        }
    </style>

    <h2 class="faq-title">{{ __('Frequently Asked Questions') }}</h2>

<div class="accordion" id="faqAccordion">
    @foreach($faqs as $index => $faq)
        @php
            $locale = app()->getLocale();
            $question = $locale === 'ar' ? $faq->question_ar : $faq->question_en;
            $answer = $locale === 'ar' ? $faq->answer_ar : $faq->answer_en;
        @endphp

        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading{{ $index }}">
                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqCollapse{{ $index }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="faqCollapse{{ $index }}">
                    {{ $question }}
                </button>
            </h2>
            <div id="faqCollapse{{ $index }}"
                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                 aria-labelledby="faqHeading{{ $index }}"
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    {!! nl2br(e($answer)) !!}
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection
