@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">

                <!-- Flash messages -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.stats.store') }}" method="POST">
                    @csrf

                    <!-- Language Tabs -->
                    <ul class="nav nav-tabs" id="langTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab">Arabic</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="langTabsContent">
                        <!-- English Tab -->
                        <div class="tab-pane fade show active" id="en" role="tabpanel">
                            <div class="form-group mb-3">
                                <label>Title (EN)</label>
                                <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}" required>
                            </div>
                        </div>

                        <!-- Arabic Tab -->
                        <div class="tab-pane fade" id="ar" role="tabpanel">
                            <div class="form-group mb-3">
                                <label>Title (AR)</label>
                                <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Value -->
                    <div class="form-group mb-3">
                        <label>Value</label>
                        <input type="text" name="value" class="form-control" value="{{ old('value') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Stat</button>
                    <a href="{{ route('admin.stats.index') }}" class="btn btn-secondary">Cancel</a>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Bootstrap tab initialization
    const tabTriggers = document.querySelectorAll('#langTabs a');
    tabTriggers.forEach(el => {
        const tab = new bootstrap.Tab(el);
        el.addEventListener('click', function (e) {
            e.preventDefault();
            tab.show();
        });
    });
</script>
@endsection
