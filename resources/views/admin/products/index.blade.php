@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">

                        <!-- Flash messages -->
                        @if(session('status-success'))
                            <div class="alert alert-success">{{ session('status-success') }}</div>
                        @endif

                        @if(session('status-error'))
                            <div class="alert alert-danger">{{ session('status-error') }}</div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title pt-2">Products</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New</a>
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
                                    <table class="table table-bordered">
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
                                            @forelse($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td><img src="{{ asset('/' . $product->image) }}" alt="image" width="60"></td>
                                                    <td>{{ $product->name_en }}</td>
                                                    <td>{!! Str::limit($product->description_en, 100) !!}</td>
                                                    <td><span class="badge bg-{{ $product->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($product->status) }}</span></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.products.edit', $product->id) }}">Edit</a>

                                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">Delete</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete this product?
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
                                                    <td colspan="6" class="text-center">No products found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Arabic Tab -->
                            <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered">
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
                                            @forelse($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td><img src="{{ asset('/' . $product->image) }}" alt="image" width="60"></td>
                                                    <td>{{ $product->name_ar }}</td>
                                                    <td>{!! Str::limit($product->description_ar, 100) !!}</td>
                                                    <td><span class="badge bg-{{ $product->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($product->status) }}</span></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.products.edit', $product->id) }}">Edit</a>

                                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalAR{{ $product->id }}">Delete</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModalAR{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabelAR{{ $product->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteModalLabelAR{{ $product->id }}">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete this product?
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
                                                    <td colspan="6" class="text-center">No products found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
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
    // Enable tab functionality in case needed
    var myTabs = new bootstrap.Tab(document.querySelector('#ar-tab'));
</script>
@endsection
