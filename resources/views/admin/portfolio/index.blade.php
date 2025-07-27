@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <!-- Flash Messages -->
                        @if(session('status-success'))
                            <div class="alert alert-success">{{ session('status-success') }}</div>
                        @endif
                        @if(session('status-error'))
                            <div class="alert alert-danger">{{ session('status-error') }}</div>
                        @endif

                        <!-- Title & Add Button -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5 class="card-title pt-2">Resumes</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Add New Resume</a>
                            </div>
                        </div>

                        <!-- Language Tabs -->
                        <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arabic</a>
                            </li>
                        </ul>

                        <!-- Tab Contents -->
                        <div class="tab-content mt-3" id="languageTabsContent">
                            <!-- English Tab -->
                            <div class="tab-pane fade show active" id="en" role="tabpanel" aria-labelledby="en-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Resume Name (EN)</th>
                                                <th>Resume File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($portfolios as $portfolio)
                                                <tr>
                                                    <td>{{ $portfolio->id }}</td>
                                                    <td>{{ $portfolio->portfolio_name_en }}</td>
                                                    <td>
                                                        @if($portfolio->resume_path)
                                                            <iframe src="{{ asset('storage/' . $portfolio->resume_path) }}" width="300" height="200" frameborder="0"></iframe>
                                                            <p><a href="{{ asset('storage/' . $portfolio->resume_path) }}" target="_blank" class="btn btn-sm btn-secondary mt-2">Download</a></p>
                                                        @else
                                                            No file available
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $portfolio->id }}">
                                                                Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModal{{ $portfolio->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $portfolio->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete "{{ $portfolio->portfolio_name_en }}"?
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
                                                    <td colspan="4" class="text-center">No resumes found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Arabic Tab -->
                            <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Resume Name (AR)</th>
                                                <th>Resume File</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($portfolios as $portfolio)
                                                <tr>
                                                    <td>{{ $portfolio->id }}</td>
                                                    <td>{{ $portfolio->portfolio_name_ar }}</td>
                                                    <td>
                                                        @if($portfolio->resume_path)
                                                            <iframe src="{{ asset('storage/' . $portfolio->resume_path) }}" width="300" height="200" frameborder="0"></iframe>
                                                            <p><a href="{{ asset('storage/' . $portfolio->resume_path) }}" target="_blank" class="btn btn-sm btn-secondary mt-2">Download</a></p>
                                                        @else
                                                            No file available
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalAR{{ $portfolio->id }}">
                                                                Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModalAR{{ $portfolio->id }}" tabindex="-1" aria-labelledby="deleteModalARLabel{{ $portfolio->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete "{{ $portfolio->portfolio_name_ar }}"?
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
                                                    <td colspan="4" class="text-center">No resumes found.</td>
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
    </div>
</div>
@endsection
