{{-- @include('front.layouts.pages_slider') --}}
<x-front-slider />

@extends('front.layouts.app')

@section('content')

<!-- Main container for the page content -->
<div class="container mt-5">
    <style>
        .career-title {
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

        .file-upload {
            margin-top: 20px;
        }

        .file-note {
            font-size: 13px;
            color: #555;
        }

        .company-logos img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .career-title {
                font-size: 28px;
            }

            .form-section, .contact-box {
                padding: 20px;
            }
        }
    </style>

    <div class="container mt-5">
        <h2 class="career-title" style="font-size: 36px; margin: 8.5px 0; color: green;">
            {{ __('careers') }}
        </h2>

        <div class="row g-4">
            <!-- Left Form Section -->
            <div class="col-lg-8">
                <div class="form-section">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">{{ __('First Name') }}</label>
                                <input type="text" class="form-control" name="first_name" placeholder="{{ __('Enter your first name') }}">
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __('Last Name') }}</label>
                                <input type="text" class="form-control" name="last_name" placeholder="{{ __('Enter your last name') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">{{ __('Nationality') }}</label>
                                <input type="text" class="form-control" name="nationality" placeholder="{{ __('Nationality') }}">
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __('Gender') }}</label>
                                <select class="form-select" name="gender">
                                    <option selected disabled>{{ __('Select') }}</option>
                                    <option value="male">{{ __('Male') }}</option>
                                    <option value="female">{{ __('Female') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">{{ __('Phone') }}</label>
                                <input type="text" class="form-control" name="phone" placeholder="{{ __('Enter your phone number') }}">
                            </div>
                            <div class="col">
                                <label class="form-label">{{ __('E-Mail') }}</label>
                                <input type="email" class="form-control" name="email" placeholder="{{ __('Enter your email') }}">
                            </div>
                        </div>

                        <div class="file-upload mb-3">
                            <label class="form-label">{{ __('Upload CV') }}</label>
                            <input type="file" class="form-control" name="cv">
                            <p class="file-note">{{ __('Max. file size: 2MB') }}</p>
                        </div>

                        <div class="file-upload mb-3">
                            <label class="form-label">{{ __('Upload Cover Letter') }}</label>
                            <input type="file" class="form-control" name="cover_letter">
                            <p class="file-note">{{ __('Max. file size: 2MB') }}</p>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">{{ __('Submit Application') }}</button>
                    </form>
                </div>
            </div>

            <!-- Right Contact Info Section -->
            <div class="col-lg-4">
                <div class="contact-box">
                    <h4>{{ __('Get In Touch') }}</h4>
                    <p><strong>{{ __('Factory Address') }}</strong><br>
                        {{ $settings->address ?? __('Address not available') }}
                    </p>

                    <p><strong>{{ __('Contact') }}</strong><br>
                        {{ __('Tel') }}: {{ $settings->phone ?? __('Phone not available') }}<br>
                        {{ __('Fax') }}: {{ $settings->fax ?? __('Fax not available') }}<br>
                        {{ __('Email') }}: {{ $settings->email ?? __('Email not available') }}
                    </p>

                    <p class="mt-3">{{ __('Member of Munir Sukhtian International') }}</p>

                    <div class="company-logos">
                        <img src="{{ asset('/Rayyan_Logo.svg' . $settings->logo ?? 'Rayyan_Logo.svg') }}" alt="Company Logo" width="200">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
