<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NovelCategory extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
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

    public function novel(): HasMany
    {
        return $this->hasMany(Novel::class, 'novel_category_id');
    }
}
