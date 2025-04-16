@extends('layouts.master')

@section ('pageTitle', 'Create new Project')

@section('content')
<div class="container mt-5">
    <h1 class="my-5 text-uppercase text-center">Create a new Project</h1>

    <!-- Form -->
    <div class="form">
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Title -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="New Project" required>
                </div>
                <!-- Subtitle -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                        placeholder="Subtitle for new project">
                </div>
                <!-- Client -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="client" class="form-label">Client</label>
                    <input type="text" class="form-control" id="client" name="client" placeholder="Company name">
                </div>
                <!-- Description -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea row=3 class="form-control" id="description"
                        name="description" placeholder="This project is about..."></textarea>
                </div>
                <!-- Start Date -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <!-- End Date -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <!-- Status -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select" id="status">
                        @foreach (App\ProjectStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ ($status->label()) }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Categories -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" class="form-select" id="category">
                        @foreach (App\CategoryEnum::cases() as $category)
                        <option value="{{ $category->categoryId() }}">{{ ($category->label()) }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Types -->
                <div class="col-sm-6 col-md-4 mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type_id" class="form-select" id="type">
                        @foreach (App\TypeEnum::cases() as $type)
                        <option value="{{ $type->typeId() }}">{{ ($type->label()) }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Tags -->
                <div class="col-6 mb-3">
                    <label for="tags" class="form-labe mb-0 me-2">Tags</label>
                    @include('partials.tagFormModal')
                    <!-- <div class="form-control" id="tags">
                        @foreach ($tags as $tag)
                            <input type="checkbox" class="form-check-input me-1" id="tag_{{ $tag->id }}" name="tags[]"
                            value="{{ $tag->id }}">
                            <label for="tag_{{ $tag->id }}" class="form-label me-4">{{ $tag->name }}</label>
                        @endforeach
                    </div> -->
                </div>
                <!-- Tools -->
                <div class="col-6 mb-3">
                    <label for="tools" class="form-label">Tools</label>
                    <div class="form-control" id="tools">
                        @foreach ($tools as $tool)
                            <input type="checkbox" class="form-check-input me-1" id="tool_{{ $tool->id }}" name="tools[]"
                            value="{{ $tool->id }}">
                            <label for="tool_{{ $tool->id }}" class="form-label me-4">{{ $tool->name }}</label>
                        @endforeach
                    </div>
                </div>
                <!-- Cover Image -->
                <div class="col mb-3">
                    <label for="cover_image" class="form-label">Cover Image</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Project</button>
        </form>
    </div>
</div>
@endsection