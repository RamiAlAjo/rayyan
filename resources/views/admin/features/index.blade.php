@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                @if(session('status-success'))
                    <div class="alert alert-success">{{ session('status-success') }}</div>
                @endif
                @if(session('status-error'))
                    <div class="alert alert-danger">{{ session('status-error') }}</div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title pt-2">Features</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.features.create') }}" class="btn btn-primary">Add New Feature</a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Title (EN)</th>
                                <th>Title (AR)</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($features as $feature)
                                <tr>
                                    <td>{{ $feature->id }}</td>
                                    <td>
                                        @if($feature->icon_path)
                                            <img src="{{ asset('storage/' . $feature->icon_path) }}" alt="icon" width="30">
                                        @else
                                            <span class="text-muted">No icon</span>
                                        @endif
                                    </td>
                                    <td>{{ $feature->title_en }}</td>
                                    <td>{{ $feature->title_ar }}</td>
                                    <td>
                                        @if($feature->status === 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $feature->order }}</td>
                                    <td>
                                        <a href="{{ route('admin.features.edit', $feature->id) }}" class="btn btn-sm btn-info">Edit</a>

                                        <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No features found.</td>
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
