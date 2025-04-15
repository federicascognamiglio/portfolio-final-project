@extends('layouts.master')

@section ('pageTitle', 'My Projects')

@section('content')
<div class="container mt-5">
    <!-- Title -->
    <h1 class="my-5 text-center text-uppercase">My Projects</h1>

    <!-- Status Filters -->
    <div class="mb-4 text-center">
        <a href="{{ route('projects.index') }}" class="btn btn-sm btn-outline-primary {{ request('status') == null ? 'active' : '' }}">
            All
        </a>
        <a href="{{ route('projects.index', ['status' => 'published']) }}"
            class="btn btn-sm btn-outline-primary {{ request('status') == 'published' ? 'active' : '' }}">
            Published
        </a>
        <a href="{{ route('projects.index', ['status' => 'draft']) }}"
            class="btn btn-sm btn-outline-primary {{ request('status') == 'draft' ? 'active' : '' }}">
            Draft
        </a>
        <a href="{{ route('projects.index', ['status' => 'archived']) }}"
            class="btn btn-sm btn-outline-primary {{ request('status') == 'archived' ? 'active' : '' }}">
            Archived
        </a>
    </div>

    <!-- Projects Table -->
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col text-uppercase">Title</th>
                <th scope="col text-uppercase">Client</th>
                <th scope="col text-uppercase">Category</th>
                <th scope="col text-uppercase">Start Date</th>
                <th scope="col text-uppercase">End Date</th>
                <th scope="col text-uppercase">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>
                    @if ($project->client)
                    $project->client
                    @else
                    Personal Project
                    @endif
                </td>
                <td>{{ $project->category['name'] }}</td>
                <td>{{ $project->start_date }}</td>
                <td>{{ $project->end_date }}</td>
                <td>{{ $project->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection