<x-front-slider />
@extends('front.layouts.app')

@section('content')

<div class="container mt-5">

    <style>
        .project-title {
            font-size: 36px;
            font-weight: bold;
            color: #00704A; /* Dark green */
            text-align: center;
            margin-bottom: 40px;
        }

        .project-item img {
            width: 100%;
            max-width: 150px;
            height: auto;
        }

        .project-item p {
            margin-top: 15px;
            font-size: 18px;
            font-weight: 500;
            color: #00704A;
        }

        @media (max-width: 576px) {
            .project-title {
                font-size: 28px;
                margin-bottom: 30px;
            }

            .project-item p {
                font-size: 16px;
            }
        }
    </style>
<!-- Current Project Title -->
<h2 class="project-title text-center mb-4">
    {{ app()->getLocale() === 'ar' ? $project->name_ar : $project->name_en }}
</h2>

<!-- Project Description -->
<div class="project-details mb-5">
    <div class="project-info">
        <h3>{{ app()->getLocale() === 'ar' ? $project->name_ar : $project->name_en }}</h3>
        <p>
            {{ app()->getLocale() === 'ar' ? ($project->description_ar ?? __('No description available.')) : ($project->description_en ?? __('No description available.')) }}
        </p>
    </div>
</div>

<!-- Other Projects in Same Subcategory -->
<h2 class="project-title text-center mb-4">
    {{ __('Other Projects in This Subcategory') }}
</h2>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">
    @forelse ($otherProjects as $otherProject)
        <div class="col text-center project-item">
            <a href="{{ route('projects.show', $otherProject->id) }}">
                <img src="{{ $otherProject->image ? asset('storage/' . $otherProject->image) : asset('images/placeholder.png') }}"
                     alt="{{ app()->getLocale() === 'ar' ? $otherProject->name_ar : $otherProject->name_en }}"
                     class="img-fluid mb-2" style="max-height: 180px;">
                <p>{{ app()->getLocale() === 'ar' ? $otherProject->name_ar : $otherProject->name_en }}</p>
            </a>
        </div>
    @empty
        <div class="col-12 text-center">
            <p>{{ __('No other projects available in this subcategory at the moment.') }}</p>
        </div>
    @endforelse
</div>

@endsection
