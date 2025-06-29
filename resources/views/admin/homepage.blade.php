@extends('admin.layouts.app')

@section('content')

<style>
    /* Custom CSS for Admin Dashboard */
body {
    background-color: #f8f9fa;
    color: #343a40;
    font-family: 'Arial', sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.card {
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    background-color: #ffffff;
    color: #343a40;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.card-header {
    background-color: #9e6de0;
    color: white;
    font-weight: bold;
    border-radius: 8px 8px 0 0;
    padding: 15px;
    text-align: center;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1.1rem;
}

.list-group-item {
    border: none;
    padding: 10px 15px;
    transition: background-color 0.3s ease;
    border-bottom: 1px solid #e9ecef;
}

.list-group-item:last-child {
    border-bottom: none;
}

.list-group-item:hover {
    background-color: #f1f1f1;
}

h1, h2 {
    font-weight: bold;
    color: #343a40;
    text-align: center;
}

h2 {
    margin-top: 30px;
}

/* Additional styling for better visual appeal */
a {
    color: #343a40;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>
<div class="container">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Hello</h5>
                    <p class="card-text">{{ $user->name }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    {{-- <p class="card-text">{{ $totalProducts }}</p> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Gallery Items</h5>
                    {{-- <p class="card-text">{{ $totalGalleryItems }}</p> --}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Photo Gallery Items</h5>
                    {{-- <p class="card-text">{{ $totalPhotoGalleryItems }}</p> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Video Gallery Items</h5>
                    {{-- <p class="card-text">{{ $totalVideoGalleryItems }}</p> --}}
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center mb-4">Recent Activities</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Recent Users
                </div>
                <ul class="list-group list-group-flush">
                    {{-- @foreach ($recentUsers as $recentUser)
                        <li class="list-group-item">{{ $recentUser->name }} ({{ $recentUser->email }})</li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Recent Products
                </div>
                <ul class="list-group list-group-flush">
                    {{-- @foreach ($recentProducts as $recentProduct)
                        <li class="list-group-item">{{ $recentProduct->title_en }}</li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Recent Gallery Items
                </div>
                <ul class="list-group list-group-flush">
                    {{-- @foreach ($recentGalleryItems as $recentGalleryItem)
                        <li class="list-group-item">{{ $recentGalleryItem->gallery_title_en }}</li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Recent Photo Gallery Items
                </div>
                <ul class="list-group list-group-flush">
                    {{-- @foreach ($recentPhotoGalleryItems as $recentPhotoGalleryItem)
                        <li class="list-group-item">{{ $recentPhotoGalleryItem->album_title_en }}</li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Recent Video Gallery Items
                </div>
                <ul class="list-group list-group-flush">
                    {{-- @foreach ($recentVideoGalleryItems as $recentVideoGalleryItem)
                        <li class="list-group-item">{{ $recentVideoGalleryItem->video_title_en }}</li>
                    @endforeach --}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
