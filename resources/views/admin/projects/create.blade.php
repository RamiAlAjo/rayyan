@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                <!-- Flash messages -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Tabs -->
                    <ul class="nav nav-tabs" id="langTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab">Arabic</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="langTabsContent">
                        <!-- English -->
                        <div class="tab-pane fade show active" id="en" role="tabpanel">
                            <div class="form-group mb-3">
                                <label>Name (EN)</label>
                                <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Description (EN)</label>
                                <textarea name="description_en" class="form-control" rows="4">{{ old('description_en') }}</textarea>
                            </div>
                        </div>

                        <!-- Arabic -->
                        <div class="tab-pane fade" id="ar" role="tabpanel">
                            <div class="form-group mb-3">
                                <label>Name (AR)</label>
                                <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Description (AR)</label>
                                <textarea name="description_ar" class="form-control" rows="4">{{ old('description_ar') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="form-group mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <!-- Status -->
                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Category -->
                    <div class="form-group mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subcategory -->
                    <div class="form-group mb-3">
                        <label>Subcategory</label>
                        <select name="subcategory_id" class="form-control">
                            <option value="">-- Optional --</option>
                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Project</button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
