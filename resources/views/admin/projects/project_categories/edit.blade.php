@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="card-title mb-4">Edit Project Category</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects_categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name_en" class="form-label">Name (English)</label>
                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en', $category->name_en) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="name_ar" class="form-label">Name (Arabic)</label>
                        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar', $category->name_ar) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description_en" class="form-label">Description (English)</label>
                        <textarea class="form-control" id="description_en" name="description_en" rows="3">{{ old('description_en', $category->description_en) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="description_ar" class="form-label">Description (Arabic)</label>
                        <textarea class="form-control" id="description_ar" name="description_ar" rows="3">{{ old('description_ar', $category->description_ar) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        @if($category->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100">
                            </div>
                        @endif
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                    <a href="{{ route('admin.projects_categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
