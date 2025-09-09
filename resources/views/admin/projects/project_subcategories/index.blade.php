@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title">Project Subcategories</h5>
                    <a href="{{ route('admin.projects_subcategories.create') }}" class="btn btn-primary">Add New</a>
                </div>

                <!-- Language Tabs -->
                <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arabic</a>
                    </li>
                </ul>

                <div class="tab-content pt-3" id="languageTabsContent">
                    <!-- English Tab -->
                    <div class="tab-pane fade show active" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name (EN)</th>
                                        <th>Category</th>
                                        <th>Description (EN)</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subcategories as $subcategory)
                                        <tr>
                                            <td>{{ $subcategory->id }}</td>
                                            <td>
                                                @if($subcategory->image)
                                                    <img src="{{ asset('/' . $subcategory->image) }}" width="60" alt="Image">
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>{{ $subcategory->name_en }}</td>
                                            <td>{{ $subcategory->category->name_en ?? '-' }}</td>
                                            <td>{!! Str::limit($subcategory->description_en, 80) !!}</td>
                                            <td>
                                                <span class="badge bg-{{ $subcategory->status ? 'success' : 'secondary' }}">
                                                    {{ $subcategory->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.projects_subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-info">Edit</a>

                                                <form action="{{ route('admin.projects_subcategories.destroy', $subcategory->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this subcategory?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No subcategories found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Arabic Tab -->
                    <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name (AR)</th>
                                        <th>Category</th>
                                        <th>Description (AR)</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subcategories as $subcategory)
                                        <tr>
                                            <td>{{ $subcategory->id }}</td>
                                            <td>
                                                @if($subcategory->image)
                                                    <img src="{{ asset('/' . $subcategory->image) }}" width="60" alt="Image">
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>{{ $subcategory->name_ar }}</td>
                                            <td>{{ $subcategory->category->name_ar ?? '-' }}</td>
                                            <td>{!! Str::limit($subcategory->description_ar, 80) !!}</td>
                                            <td>
                                                <span class="badge bg-{{ $subcategory->status ? 'success' : 'secondary' }}">
                                                    {{ $subcategory->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.projects_subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-info">Edit</a>

                                                <form action="{{ route('admin.projects_subcategories.destroy', $subcategory->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل تريد حذف هذا التصنيف الفرعي؟')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">لا توجد تصنيفات فرعية.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- End tab-content -->

            </div>
        </div>
    </div>
</div>
@endsection
