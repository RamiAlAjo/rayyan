@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 offset-xl-2">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="card-title mb-4">Create New Category</h5>

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

                <!-- Language Tabs -->
                <ul class="nav nav-tabs mb-3" id="categoryTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arabic</a>
                    </li>
                </ul>

                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="tab-content" id="categoryTabsContent">
                        <!-- English Tab Content -->
                        <div class="tab-pane fade show active" id="en" role="tabpanel" aria-labelledby="en-tab">
                            <div class="mb-3">
                                <label for="name_en" class="form-label">Name (EN)</label>
                                <input type="text" name="name_en" id="name_en" class="form-control" value="{{ old('name_en') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description_en" class="form-label">Description (EN)</label>
                                <textarea name="description_en" id="description_en" class="form-control" rows="4">{{ old('description_en') }}</textarea>
                            </div>
                        </div>

                        <!-- Arabic Tab Content -->
                        <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                            <div class="mb-3">
                                <label for="name_ar" class="form-label">Name (AR)</label>
                                <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{ old('name_ar') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description_ar" class="form-label">Description (AR)</label>
                                <textarea name="description_ar" id="description_ar" class="form-control" rows="4">{{ old('description_ar') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <small class="form-text text-muted">Recommended size: 400x400px JPG/PNG</small>
                    </div>

                    <!-- Status Dropdown -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <button type="submit" class="btn btn-primary">Create Category</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary ms-2">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize Bootstrap tabs
    var myTab = new bootstrap.Tab(document.querySelector('#en-tab')); // Set default active tab
    myTab.show();
</script>
@endpush
