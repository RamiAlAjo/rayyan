@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title pt-2 text-dark font-weight-bold">@isset($portfolio) Edit @else Create @endisset Portfolio</h5>
                        <form action="@isset($portfolio) {{ route('admin.portfolio.update', $portfolio->id) }} @else {{ route('admin.portfolio.store') }} @endisset" method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($portfolio)
                                @method('PUT')
                            @endisset

                            <!-- English Title -->
                            <div class="form-group">
                                <label for="portfolio_name_en" class="font-weight-semibold">Portfolio Title (English)</label>
                                <input type="text" class="form-control shadow-sm rounded" name="portfolio_name_en" id="portfolio_name_en" value="{{ old('portfolio_name_en', $portfolio->portfolio_name_en ?? '') }}" placeholder="Enter English Title">
                                @error('portfolio_name_en')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Arabic Title -->
                            <div class="form-group">
                                <label for="portfolio_name_ar" class="font-weight-semibold">Portfolio Title (Arabic)</label>
                                <input type="text" class="form-control shadow-sm rounded" name="portfolio_name_ar" id="portfolio_name_ar" value="{{ old('portfolio_name_ar', $portfolio->portfolio_name_ar ?? '') }}" placeholder="Enter Arabic Title">
                                @error('portfolio_name_ar')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Resume File -->
                            <div class="form-group">
                                <label for="resume" class="font-weight-semibold">Resume File</label>
                                <input type="file" class="form-control shadow-sm rounded" name="resume" id="resume" onchange="previewResume(this)">
                                @error('resume')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                @isset($portfolio)
                                    <div id="resume-preview" class="mt-3">
                                        <!-- If it's a PDF, show it in an iframe -->
                                        @if(Str::endsWith($portfolio->resume, '.pdf'))
                                            <iframe src="{{ Storage::url($portfolio->resume) }}" width="100%" height="400px" class="border-0"></iframe>
                                        @else
                                            <a href="{{ Storage::url($portfolio->resume) }}" target="_blank" class="btn btn-info btn-sm">View Resume</a>
                                        @endif
                                    </div>
                                @endisset
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-dark rounded-pill shadow-sm">@isset($portfolio) Update @else Create @endisset</button>
                                <button type="button" class="btn btn-light rounded-pill shadow-sm" onclick="window.location='{{ route('admin.portfolio.index') }}'">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview resume file when selected
    function previewResume(input) {
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById('resume-preview');
            const fileType = file.type;

            // Check if the file is a PDF, display it in iframe
            if (fileType === 'application/pdf') {
                preview.innerHTML = `<iframe src="${e.target.result}" width="100%" height="400px" class="border-0"></iframe>`;
            } else {
                preview.innerHTML = `<a href="${e.target.result}" target="_blank" class="btn btn-info btn-sm">View Resume</a>`;
            }
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection
