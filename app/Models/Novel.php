<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Novel extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'novel_category_id',
        'writer',
        'title',
        'description',
        'image',
        'publish_date',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class, 'novel_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(NovelCategory::class, 'novel_category_id');
    }
}
