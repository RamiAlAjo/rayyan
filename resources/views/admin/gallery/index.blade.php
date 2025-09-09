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
                        <h5 class="card-title pt-2">Photos Gallery</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Add New Photo</a>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title (EN)</th>
                                <th>Title (AR)</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($photos as $photo)
                                <tr>
                                    <td>{{ $photo->id }}</td>
                                    <td>{{ $photo->image_title_en }}</td>
                                    <td>{{ $photo->image_title_ar }}</td>
                                    <td>
                                        @if($photo->images)
                                            <img src="{{ asset('/' . $photo->images) }}" alt="Image" width="100">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.gallery.edit', $photo->id) }}" class="btn btn-sm btn-info">Edit</a>

                                        <form action="{{ route('admin.gallery.destroy', $photo->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No photos found.</td>
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
