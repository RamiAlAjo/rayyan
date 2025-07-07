@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title pt-2">Project Categories</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.projects_categories.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                <!-- Language Tabs -->
                <ul class="nav nav-tabs mt-3" id="languageTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab">Arabic</a>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="languageTabsContent">
                    <!-- English Tab -->
                    <div class="tab-pane fade show active" id="en" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name (EN)</th>
                                        <th>Description (EN)</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>
                                                @if($category->image)
                                                    <img src="{{ asset('storage/' . $category->image) }}" width="60" alt="Image">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $category->name_en }}</td>
                                            <td>{!! Str::limit($category->description_en, 80) !!}</td>
                                            <td>
                                                <span class="badge bg-{{ $category->status ? 'success' : 'secondary' }}">
                                                    {{ $category->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.projects_categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>

                                                <form action="{{ route('admin.projects_categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">
                                                        Delete
                                                    </button>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Delete</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this category?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No categories found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>

                    <!-- Arabic Tab -->
                    <div class="tab-pane fade" id="ar" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name (AR)</th>
                                        <th>Description (AR)</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>
                                                @if($category->image)
                                                    <img src="{{ asset('storage/' . $category->image) }}" width="60" alt="Image">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $category->name_ar }}</td>
                                            <td>{!! Str::limit($category->description_ar, 80) !!}</td>
                                            <td>
                                                <span class="badge bg-{{ $category->status ? 'success' : 'secondary' }}">
                                                    {{ $category->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.projects_categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>

                                                <form action="{{ route('admin.projects_categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalAR{{ $category->id }}">
                                                        Delete
                                                    </button>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModalAR{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirm Delete</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this category?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No categories found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
