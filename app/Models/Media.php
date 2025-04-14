<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'project_id',
        'type',
        'url',
        'description',
        'position',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
