@extends('layouts.master')

@section ('pageTitle', $project->title)

@section ('content')
<div class="container mt-5 d-flex flex-column align-items-center">
    <h2 class="text-uppercase mt-5">{{ $project->title }}</h2>
    <p class="text-body-secondary">{{ $project->subtitle }}</p>
    <span class="badge text-bg-primary mb-4">{{ $project->category['name'] }} - {{ $project->type['name'] }}</span>
    <img src="{{ $project->cover_image ? $project->cover_image : 'https://placehold.co/600x400' }}"
        alt="{{ $project->title }}" class="mb-3 w-100">
    <div class="d-flex justify-content-between w-100">
        <div>
            <p class="text-muted text-capitalize">Status: {{ $project->status }}</p>
            <p class="text-muted">Client: {{ $project->client ? $project->client : 'Personal project'}}
            </p>
            <p>Tags:</p>
            <p>Tools:</p>
        </div>
        @if ($project->start_date)
        <div>
            <p class="text-muted">Started on {{ $project->start_date }}</p>
            <p class="text-muted">Ended on
                {{ $project->end_date ? $project->end_date : 'On going' }}</p>
        </div>
        @endif
    </div>
    <p class="text-capitalize align-self-start mb-1 mt-3"><strong>description</strong></p>
    <p class="mb-5">{{ $project->description }}</p>
</div>
@endsection