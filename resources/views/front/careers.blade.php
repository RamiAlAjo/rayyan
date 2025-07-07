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

    <h2 class="career-title">Careers</h2>

    <div class="row g-4">
        <!-- Left Form Section -->
        <div class="col-lg-8">
            <div class="form-section">
                <form>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter your first name">
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter your last name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Nationality</label>
                            <input type="text" class="form-control" placeholder="Nationality">
                        </div>
                        <div class="col">
                            <label class="form-label">Gender</label>
                            <select class="form-select">
                                <option selected disabled>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" placeholder="Enter your phone number">
                        </div>
                        <div class="col">
                            <label class="form-label">E-Mail</label>
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                    </div>

                    <div class="file-upload mb-3">
                        <label class="form-label">Upload CV</label>
                        <input type="file" class="form-control">
                        <p class="file-note">Max. file size: 2MB</p>
                    </div>

                    <div class="file-upload mb-3">
                        <label class="form-label">Upload Cover Letter</label>
                        <input type="file" class="form-control">
                        <p class="file-note">Max. file size: 2MB</p>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Submit Application</button>
                </form>
            </div>
        </div>

        <!-- Right Contact Info Section -->
        <div class="col-lg-4">
            <div class="contact-box">
                <h4>Get In Touch</h4>
                <p><strong>Factory Address</strong><br>
                    Amman – Jordan – Abu Alanda Industrial Area<br>
                    Al-Hazam Street<br><br>
                    Saudi Arabia – Al-Malaz
                </p>

                <p><strong>Contact</strong><br>
                    Tel: 0096264161787 / 009625643888<br>
                    Fax: 0096264165081 / 009625543882<br>
                    Email: admin@rayyan.com.jo
                </p>

                <p class="mt-3">Member of Munir Sukhtian International</p>

                <div class="company-logos">
                    <img src="Career.png" alt="Company Logo">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
