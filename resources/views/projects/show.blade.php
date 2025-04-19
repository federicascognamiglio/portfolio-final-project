@extends('layouts.master')

@section ('pageTitle', $project->title)

@section ('content')
<div class="container mt-5 mb-5 d-flex flex-column align-items-center">
    <h2 class="text-uppercase mt-5">{{ $project->title }}</h2>
    <p class="text-body-secondary">{{ $project->subtitle }}</p>
    <span class="badge text-bg-primary mb-4">{{ $project->category['name'] }} - {{ $project->type['name'] }}</span>
    @if ($project->cover_image)
    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="mb-5 w-25">
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

    <!-- Media -->
    <!-- Project Media -->
    <div class="col mb-3">
        <!-- Media modal button -->
        <button type="button" data-bs-toggle="modal" data-bs-target="#mediaModal" class="btn btn-sm btn-primary">
            Add Media
        </button>
    </div>

    <div class="d-flex justify-content-center gap-4">
        <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">All Projects</a>
        <a href="{{ route('projects.edit', $project->slug) }}" class="btn btn-outline-warning">Edit</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Delete
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The project "{{ $project->title }}" will be <strong>permanently deleted</strong>. Are you sure you
                    want to proceed?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Modal handle media -->
@include('partials.mediaFormModal')

@section('scripts')
<!-- Media handle Script -->
@vite('resources/js/mediaForm.js')
@endsection