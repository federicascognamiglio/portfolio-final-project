@extends('layouts.master')

@section ('pageTitle', $project->title)

@section ('content')
<div class="container mt-5 mb-5 d-flex flex-column align-items-center">
    <h2 class="text-uppercase mt-5">{{ $project->title }}</h2>
    <p class="text-body-secondary">{{ $project->subtitle }}</p>
    <span class="badge text-bg-primary mb-4">{{ $project->category['name'] }} - {{ $project->type['name'] }}</span>
    @if ($project->cover_image)
    <img src="{{ asset('storage/' . $project->cover_image) }}"
        alt="{{ $project->title }}" class="mb-5 w-25">
    @endif
    <div class="d-flex justify-content-between w-100">
        <div>
            <p class="text-muted text-capitalize">Status: {{ $project->status }}</p>
            <p class="text-muted">Client: {{ $project->client ? $project->client : 'Personal project'}}
            </p>
            @if (count($project->tags) > 0)
            <div class="d-flex align-items-center mb-2">
                <p class="mb-0 me-2">Tags:</p>
                @foreach ($project->tags as $tag)
                <span class="badge rounded-pill me-2"
                    style="background-color: {{ $tag->color }} ">{{ $tag->name }}</span>
                @endforeach
                @endif
            </div>
            @if (count($project->tools) > 0)
            <div class="d-flex align-items-center mb-2">
                <p class="mb-0 me-2">Tools:</p>
                @foreach ($project->tools as $tool)
                <div class="d-flex">
                    <span class="badge rounded-pill text-bg-dark me-2">{{ $tool->name }}</span>
                </div>
                @endforeach
            </div>
            @endif
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
    <div class="d-flex justify-content-center gap-4">
        <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">All Projects</a>
        <a href="{{ route('projects.edit', $project->slug) }}" class="btn btn-outline-warning">Edit</a>
        <a href="{{ route('projects.destroy', $project->id) }}" class="btn btn-outline-danger">Delete</a>
    </div>
</div>
@endsection