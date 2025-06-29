@include('front.layouts.pages_slider')
@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
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

    <h2 class="faq-title">Frequently Asked Questions</h2>

    <div class="accordion" id="faqAccordion">
        <!-- FAQ 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                    What services do you offer?
                </button>
            </h2>
            <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne"
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We offer consulting, design & planning, installation, maintenance, and technical support for agricultural infrastructure.
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeadingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                    How can I request a quote?
                </button>
            </h2>
            <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo"
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    You can fill out our contact form or call our office directly to speak with a project consultant.
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeadingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                    Do you operate internationally?
                </button>
            </h2>
            <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree"
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, we handle international projects and can coordinate logistics, installation, and maintenance globally.
                </div>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeadingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                    What is your typical project timeline?
                </button>
            </h2>
            <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour"
                 data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Project timelines vary, but most installations are completed within 4–8 weeks depending on scale and complexity.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
