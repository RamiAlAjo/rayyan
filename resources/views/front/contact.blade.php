{{-- @include('front.layouts.pages_slider') --}}
<x-front-slider />

@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
<div class="container mt-5">
    <style>

        .contact-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-section {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .contact-box {
            background-color: #115d18;
            color: #fff;
            padding: 25px;
            border-radius: 8px;
            height: 100%;
        }

        .contact-box h4 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .contact-box p {
            margin-bottom: 10px;
        }

        .company-logos img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .contact-title {
                font-size: 28px;
            }

            .form-section, .contact-box {
                padding: 20px;
            }
        }

        .contact-box {
    background-color: #115d18;
    background-image: url('{{ asset('contact background.svg') }}');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    color: #fff;
    padding: 25px;
    border-radius: 8px;
    height: 100%;
    position: relative;
    z-index: 1;
    overflow: hidden;
}

.contact-box::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.2); /* Less dark, more background visible */
    z-index: -1;
    border-radius: 8px;
}
    </style>

    <h2 class="contact-title">Contact Us</h2>

    <div class="row g-4">
        <!-- Left Contact Form -->
        <div class="col-lg-8">
            <div class="form-section">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Your full name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Your email address">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="5" placeholder="Your message..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Send Message</button>
                </form>
            </div>
        </div>

       <!-- Right Contact Information -->
<div class="col-lg-4">
    <div class="contact-box">
        <h4>Get In Touch</h4>
        <p><strong>Factory Address</strong><br>
            {!! nl2br(e($settings->address)) !!}
        </p>

        <p><strong>Contact</strong><br>
            Tel: {{ $settings->phone }}<br>
            Fax: {{ $settings->fax }}<br>
            Email: {{ $settings->contact_email }}
        </p>

        <p class="mt-3">Member of Munir Sukhtian International</p>

        <div class="company-logos">
            <img src="{{ asset('path/to/logo/' . $settings->logo) }}" alt="Company Logo">
        </div>
    </div>
</div>

    </div>
</div>

@endsection
