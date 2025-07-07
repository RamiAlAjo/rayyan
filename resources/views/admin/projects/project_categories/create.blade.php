@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                <h4 class="card-title">Add New Project Category</h4>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects_categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name_en" class="form-label">Name (English)</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="name_ar" class="form-label">Name (Arabic)</label>
                        <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description_en" class="form-label">Description (English)</label>
                        <textarea name="description_en" class="form-control" rows="3">{{ old('description_en') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="description_ar" class="form-label">Description (Arabic)</label>
                        <textarea name="description_ar" class="form-control" rows="3">{{ old('description_ar') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('admin.projects_categories.index') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
