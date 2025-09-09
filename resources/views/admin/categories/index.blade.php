@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                <!-- Display success/error messages -->
                @if(session('status-success'))
                    <div class="alert alert-success">{{ session('status-success') }}</div>
                @endif
                @if(session('status-error'))
                    <div class="alert alert-danger">{{ session('status-error') }}</div>
                @endif

                <!-- Header and Add New Category Button -->
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title pt-2">Categories</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>
                    </div>
                </div>

                <!-- Categories Table -->
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name (EN)</th>
                                <th>Name (AR)</th>
                                <th>Status</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ asset('/' . $category->image) }}" alt="image" width="50">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $category->name_en }}</td>
                                    <td>{{ $category->name_ar }}</td>
                                    <td>
                                        @if($category->status === 'active')
                                            <span class="badge bg-success">Active</span>
                                        @elseif($category->status === 'inactive')
                                            <span class="badge bg-secondary">Inactive</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>

                                        <!-- Delete form -->
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
