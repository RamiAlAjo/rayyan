@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5 class="card-title pt-2 text-dark font-weight-bold">Edit FAQ</h5>

                <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Language Tabs -->
                    <ul class="nav nav-tabs mb-3" id="langTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-en" data-bs-toggle="tab" href="#lang-en" role="tab" aria-controls="lang-en" aria-selected="true">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-ar" data-bs-toggle="tab" href="#lang-ar" role="tab" aria-controls="lang-ar" aria-selected="false">Arabic</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="langTabsContent">
                        <!-- English Tab -->
                        <div class="tab-pane fade show active" id="lang-en" role="tabpanel" aria-labelledby="tab-en">
                            <div class="form-group">
                                <label for="question_en">Question (English)</label>
                                <input type="text" class="form-control shadow-sm" name="question_en" id="question_en" value="{{ old('question_en', $faq->question_en) }}">
                                @error('question_en')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="answer_en">Answer (English)</label>
                                <textarea class="form-control shadow-sm" name="answer_en" id="answer_en" rows="4">{{ old('answer_en', $faq->answer_en) }}</textarea>
                                @error('answer_en')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Arabic Tab -->
                        <div class="tab-pane fade" id="lang-ar" role="tabpanel" aria-labelledby="tab-ar">
                            <div class="form-group">
                                <label for="question_ar" class="float-end">السؤال (Arabic)</label>
                                <input type="text" class="form-control shadow-sm text-end" name="question_ar" id="question_ar" value="{{ old('question_ar', $faq->question_ar) }}">
                                @error('question_ar')
                                    <div class="alert alert-danger mt-2 text-end">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="answer_ar" class="float-end">الإجابة (Arabic)</label>
                                <textarea class="form-control shadow-sm text-end" name="answer_ar" id="answer_ar" rows="4">{{ old('answer_ar', $faq->answer_ar) }}</textarea>
                                @error('answer_ar')
                                    <div class="alert alert-danger mt-2 text-end">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Active Checkbox -->
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active', $faq->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-dark rounded-pill shadow-sm">Update</button>
                        <a href="{{ route('admin.faq.index') }}" class="btn btn-light rounded-pill shadow-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
