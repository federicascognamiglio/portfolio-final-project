<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Get all projects
        $projects = Project::with('category', 'type')->get();

        return response()->json([
            'success' => true,
            'data' => $projects,
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::with('category', 'type', 'media', 'tags', 'tools')
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $project,
        ]);
    }
}

