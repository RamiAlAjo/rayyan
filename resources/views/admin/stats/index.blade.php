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
                                <h5 class="card-title pt-2">Stats</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('admin.stats.create') }}" class="btn btn-primary">Add New</a>
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
                                                <th>Value</th>
                                                <th>Title (EN)</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($stats as $stat)
                                                <tr>
                                                    <td>{{ $stat->id }}</td>
                                                    <td>{{ $stat->value }}</td>
                                                    <td>{{ $stat->title_en }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.stats.edit', $stat->id) }}">Edit</a>

                                                        <form action="{{ route('admin.stats.destroy', $stat->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this stat?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No stats found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $stats->links() }}
                                </div>
                            </div>

                            <!-- Arabic Tab -->
                            <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Value</th>
                                                <th>Title (AR)</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($stats as $stat)
                                                <tr>
                                                    <td>{{ $stat->id }}</td>
                                                    <td>{{ $stat->value }}</td>
                                                    <td>{{ $stat->title_ar }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.stats.edit', $stat->id) }}">Edit</a>

                                                        <form action="{{ route('admin.stats.destroy', $stat->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this stat?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No stats found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $stats->links() }}
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
    document.querySelectorAll('#languageTabs a').forEach(function (triggerEl) {
        let tabTrigger = new bootstrap.Tab(triggerEl);
        triggerEl.addEventListener('click', function (e) {
            e.preventDefault();
            tabTrigger.show();
        });
    });
</script>
@endsection
