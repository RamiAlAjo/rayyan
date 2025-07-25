@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="card-title">Add New Product</h5>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Tabs -->
                    <ul class="nav nav-tabs mb-3" id="languageTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab">Arabic</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="languageTabsContent">
                        <!-- English Tab -->
                        <div class="tab-pane fade show active" id="en" role="tabpanel" aria-labelledby="en-tab">
                            <div class="mb-3">
                                <label for="name_en" class="form-label">Product Name (EN)</label>
                                <input type="text" class="form-control" name="name_en" value="{{ old('name_en') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description_en" class="form-label">Description (EN)</label>
                                <textarea class="form-control" name="description_en" rows="4">{{ old('description_en') }}</textarea>
                            </div>
                        </div>

                        <!-- Arabic Tab -->
                        <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                            <div class="mb-3">
                                <label for="name_ar" class="form-label">Product Name (AR)</label>
                                <input type="text" class="form-control" name="name_ar" value="{{ old('name_ar') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description_ar" class="form-label">Description (AR)</label>
                                <textarea class="form-control" name="description_ar" rows="4">{{ old('description_ar') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name_en }}
                            </option>
                        @endforeach
                        </select>
                    </div>

                    <!-- Subcategory -->
                    <div class="mb-3">
                        <label for="subcategory_id" class="form-label">Subcategory</label>
                        <select class="form-control" name="subcategory_id">
                            <option value="">-- Optional --</option>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" required>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
