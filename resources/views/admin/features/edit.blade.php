@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Edit Feature</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title EN -->
                    <div class="mb-3">
                        <label for="title_en" class="form-label">Title (English)</label>
                        <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en', $feature->title_en) }}" required>
                    </div>

                    <!-- Title AR -->
                    <div class="mb-3">
                        <label for="title_ar" class="form-label">Title (Arabic)</label>
                        <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar', $feature->title_ar) }}" required>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Feature Icon Image</label>
                        @if ($feature->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $feature->image) }}" alt="Current Image" style="max-height: 80px;">
                            </div>
                        @endif
                        <input type="file" class="form-control" id="image" name="image">
                        <small class="text-muted">Upload new image to replace current one (optional)</small>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="active" {{ old('status', $feature->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $feature->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Feature</button>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
