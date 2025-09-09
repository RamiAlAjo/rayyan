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
                 @php
    $languages = [
        ['id' => 'en', 'label' => 'Resume Name (EN)', 'nameField' => 'portfolio_name_en', 'modalPrefix' => 'deleteModal'],
        ['id' => 'ar', 'label' => 'Resume Name (AR)', 'nameField' => 'portfolio_name_ar', 'modalPrefix' => 'deleteModalAR'],
    ];
@endphp

<div class="tab-content mt-3" id="languageTabsContent">
    @foreach($languages as $index => $lang)
        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="{{ $lang['id'] }}" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ $lang['label'] }}</th>
                            <th>Resume File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($portfolios as $portfolio)
                            <tr>
                                <td>{{ $portfolio->id }}</td>
                                <td>{{ $portfolio->{$lang['nameField']} }}</td>
                                <td>
                                    @if($portfolio->resume_path)
                                        <iframe src="{{ asset('/' . $portfolio->resume_path) }}" width="300" height="200" frameborder="0"></iframe>
                                        <p><a href="{{ asset('/' . $portfolio->resume_path) }}" target="_blank" class="btn btn-sm btn-secondary mt-2">Download</a></p>
                                    @else
                                        No file available
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $lang['modalPrefix'] }}{{ $portfolio->id }}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{ $lang['modalPrefix'] }}{{ $portfolio->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete "{{ $portfolio->{$lang['nameField']} }}"?
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
    @endforeach
</div>
 <!-- End tab-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
