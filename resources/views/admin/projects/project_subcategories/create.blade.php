@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-body">

                <h5 class="card-title">Add New Project Subcategory</h5>

                <form action="{{ route('admin.projects_subcategories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- English -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_en" class="form-label">Name (EN)</label>
                                <input type="text" name="name_en" id="name_en" class="form-control" value="{{ old('name_en') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description_en" class="form-label">Description (EN)</label>
                                <textarea name="description_en" id="description_en" class="form-control" rows="3">{{ old('description_en') }}</textarea>
                            </div>
                        </div>

                        <!-- Arabic -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_ar" class="form-label">Name (AR)</label>
                                <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{ old('name_ar') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description_ar" class="form-label">Description (AR)</label>
                                <textarea name="description_ar" id="description_ar" class="form-control" rows="3">{{ old('description_ar') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Parent Category</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image (optional)</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ old('status', 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Subcategory</button>
                    <a href="{{ route('admin.projects_subcategories.index') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
