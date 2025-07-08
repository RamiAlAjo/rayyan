@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 offset-xl-2">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="card-title mb-4">Create New Feature</h5>

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

                <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title_en" class="form-label">Title (EN)</label>
                        <input type="text" name="title_en" id="title_en" class="form-control" value="{{ old('title_en') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="title_ar" class="form-label">Title (AR)</label>
                        <input type="text" name="title_ar" id="title_ar" class="form-control" value="{{ old('title_ar') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="icon_path" class="form-label">Icon Image</label>
                        <input type="file" name="icon_path" id="icon_path" class="form-control">
                        <small class="form-text text-muted">Recommended size: 40x40px SVG/PNG</small>
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">Display Order</label>
                        <input type="number" name="order" id="order" class="form-control" value="{{ old('order', 0) }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Feature</button>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
