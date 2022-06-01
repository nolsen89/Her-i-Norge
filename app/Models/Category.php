<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'user_id',
        'type',
        'title',
        'description',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['title'] ?? false) {
            $query->where('title', 'like', '%' . request('title') . '%');
        }
    }

    public function sub_category()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    // Relationship to place
    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }

    // Relationship to post
    Public function post()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }
}
