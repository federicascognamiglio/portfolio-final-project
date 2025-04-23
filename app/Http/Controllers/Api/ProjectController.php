<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $query = Project::with('category', 'type');

        if ($request->has('category_name')) {
            $query->where('category_name', $request->category_name);
        }

        if ($request->has('type_name')) {
            $query->where('type_name', $request->type_name);
        }

        return response()->json([
            'success' => true,
            'data' => $query->get(),
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