@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5 class="card-title pt-2 text-dark font-weight-bold">Edit About Us</h5>

                <form action="{{ route('admin.about.update', $aboutUs->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Language Tabs -->
                    <ul class="nav nav-tabs mb-3" id="langTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-en" data-bs-toggle="tab" href="#lang-en" role="tab">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-ar" data-bs-toggle="tab" href="#lang-ar" role="tab">Arabic</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="langTabsContent">
                        <!-- English Tab -->
                        <div class="tab-pane fade show active" id="lang-en" role="tabpanel">
                            <div class="form-group">
                                <label for="about_us_title_en">Title (English)</label>
                                <input type="text" class="form-control shadow-sm" name="about_us_title_en" id="about_us_title_en" value="{{ old('about_us_title_en', $aboutUs->about_us_title_en) }}">
                                @error('about_us_title_en')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="about_us_description_en">Description (English)</label>
                                <textarea class="form-control shadow-sm" name="about_us_description_en" id="about_us_description_en" rows="5">{{ old('about_us_description_en', $aboutUs->about_us_description_en) }}</textarea>
                                @error('about_us_description_en')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Arabic Tab -->
                        <div class="tab-pane fade" id="lang-ar" role="tabpanel">
                            <div class="form-group">
                                <label for="about_us_title_ar" class="float-end">العنوان (Arabic)</label>
                                <input type="text" class="form-control shadow-sm text-end" name="about_us_title_ar" id="about_us_title_ar" value="{{ old('about_us_title_ar', $aboutUs->about_us_title_ar) }}">
                                @error('about_us_title_ar')
                                    <div class="alert alert-danger mt-2 text-end">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="about_us_description_ar" class="float-end">الوصف (Arabic)</label>
                                <textarea class="form-control shadow-sm text-end" name="about_us_description_ar" id="about_us_description_ar" rows="5">{{ old('about_us_description_ar', $aboutUs->about_us_description_ar) }}</textarea>
                                @error('about_us_description_ar')
                                    <div class="alert alert-danger mt-2 text-end">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-dark rounded-pill shadow-sm">Update</button>
                        <a href="{{ route('admin.about.index') }}" class="btn btn-light rounded-pill shadow-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
