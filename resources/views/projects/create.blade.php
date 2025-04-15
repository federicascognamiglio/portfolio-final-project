
@extends('layouts.master')

@section ('pageTitle', 'Create new Project')

@section('content')
<div class="container mt-5">
    <h1 class="my-5 text-uppercase text-center">Create a new Project</h1>

    <!-- Form -->
    <div class="form">
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                <div class="col mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="New Project" required>
                </div>
                <div class="col mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                        placeholder="Subtitle for new project">
                </div>
                <div class="col mb-3">
                    <label for="client" class="form-label">Client</label>
                    <input type="text" class="form-control" id="client" name="client" placeholder="Company name">
                </div>
                <div class="col mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea row=3 class="form-control" id="description"
                        name="description">This project is about...</textarea>
                </div>
                <div class="col mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="col mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <!-- Status -->
                <div class="col mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select" id="status">
                        @foreach (App\ProjectStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ ($status->label()) }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Categories -->
                <div class="col mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" class="form-select" id="category">
                        @foreach (App\CategoryEnum::cases() as $category)
                        <option value="{{ $category->value }}">{{ ($category->label()) }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Types -->
                <div class="col mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type_id" class="form-select" id="type">
                        @foreach (App\TypeEnum::cases() as $type)
                        <option value="{{ $type->value }}">{{ ($type->label()) }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Tags -->
                <!-- Tools -->
                <!-- Cover Image -->
                <div class="col mb-3">
                    <label for="cover_image" class="form-label">Cover Image</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image">
                </div>
                <!-- Media -->
                <div class="col mb-3">
                    <label for="gallery" class="form-label">Gallery</label>
                    <input type="file" class="form-control" id="gallery" name="media[]" multiple>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Project</button>
        </form>
    </div>
</div>
@endsection