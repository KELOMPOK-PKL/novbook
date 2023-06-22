<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'novel_id',
        'rating',
        'comment',
    ];


    public function novel(): BelongsTo
    {
        return $this->belongsTo(Novel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
