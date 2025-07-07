@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">

                        <!-- Flash messages -->
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title pt-2">Projects</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add New</a>
                            </div>
                        </div>

                        <!-- Language Tabs -->
                        <ul class="nav nav-tabs mt-3" id="languageTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arabic</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="languageTabsContent">
                            <!-- English Tab -->
                            <div class="tab-pane fade show active" id="en" role="tabpanel" aria-labelledby="en-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name (EN)</th>
                                                <th>Description (EN)</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($projects as $project)
                                                <tr>
                                                    <td>{{ $project->id }}</td>
                                                    <td>
                                                        @if($project->image)
                                                            <img src="{{ asset('storage/' . $project->image) }}" alt="image" width="60" height="60" style="object-fit: cover;">
                                                        @else
                                                            <span class="text-muted">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $project->name_en }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit($project->description_en, 100) !!}</td>
                                                    <td>{{ $project->category ? $project->category->name_en : '-' }}</td>
                                                    <td>{{ $project->subcategory ? $project->subcategory->name_en : '-' }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $project->status ? 'success' : 'secondary' }}">
                                                            {{ $project->status ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>

                                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $project->id }}">
                                                                Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteModalLabel{{ $project->id }}">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete this project?
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
                                                    <td colspan="8" class="text-center">No projects found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $projects->links() }}
                                </div>
                            </div>

                            <!-- Arabic Tab -->
                            <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name (AR)</th>
                                                <th>Description (AR)</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($projects as $project)
                                                <tr>
                                                    <td>{{ $project->id }}</td>
                                                    <td>
                                                        @if($project->image)
                                                            <img src="{{ asset('storage/' . $project->image) }}" alt="image" width="60" height="60" style="object-fit: cover;">
                                                        @else
                                                            <span class="text-muted">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $project->name_ar }}</td>
                                                    <td>{!! \Illuminate\Support\Str::limit($project->description_ar, 100) !!}</td>
                                                    <td>{{ $project->category ? $project->category->name_ar : '-' }}</td>
                                                    <td>{{ $project->subcategory ? $project->subcategory->name_ar : '-' }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $project->status ? 'success' : 'secondary' }}">
                                                            {{ $project->status ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>

                                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalAR{{ $project->id }}">
                                                                Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModalAR{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabelAR{{ $project->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteModalLabelAR{{ $project->id }}">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete this project?
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
                                                    <td colspan="8" class="text-center">No projects found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $projects->links() }}
                                </div>
                            </div>
                        </div> <!-- End tab content -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    // Initialize bootstrap tabs
    var triggerTabList = [].slice.call(document.querySelectorAll('#languageTabs a'))
    triggerTabList.forEach(function (triggerEl) {
      var tabTrigger = new bootstrap.Tab(triggerEl)

      triggerEl.addEventListener('click', function (event) {
        event.preventDefault()
        tabTrigger.show()
      })
    })
</script>
@endsection
