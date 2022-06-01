<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Thread extends Model
{
    use HasFactory;

    // Relationship to user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
