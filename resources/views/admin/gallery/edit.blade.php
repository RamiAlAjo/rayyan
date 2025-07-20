@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 offset-xl-2">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="card-title mb-4">Edit Photo</h5>

                <!-- Display Validation Errors -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.gallery.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Image Title (English) -->
                    <div class="mb-3">
                        <label for="image_title_en" class="form-label">Image Title (EN)</label>
                        <input type="text" name="image_title_en" id="image_title_en" class="form-control" value="{{ old('image_title_en', $photo->image_title_en) }}" required>
                    </div>

                    <!-- Image Title (Arabic) -->
                    <div class="mb-3">
                        <label for="image_title_ar" class="form-label">Image Title (AR)</label>
                        <input type="text" name="image_title_ar" id="image_title_ar" class="form-control" value="{{ old('image_title_ar', $photo->image_title_ar) }}" required>
                    </div>

                    <!-- Image File Upload -->
                    <div class="mb-3">
                        <label for="images" class="form-label">Image</label>
                        <input type="file" name="images" id="images" class="form-control">
                        <small class="form-text text-muted">Recommended size: No limit, JPEG/PNG</small>
                        @if($photo->images)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $photo->images) }}" alt="current image" class="img-thumbnail" width="150">
                            </div>
                        @endif
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" {{ old('status', $photo->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $photo->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Photo</button>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
