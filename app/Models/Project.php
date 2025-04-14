<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Type;
use App\Models\Media;
use App\Models\Tag;
use App\Models\Tool;
use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $casts = [
        'status' => ProjectStatus::class,
    ];

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'cover_image',
        'client',
        'description',
        'category_id',
        'type_id',
        'status',
        'start_date',
        'end_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tag');
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'project_tool');
    }
}
