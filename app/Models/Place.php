<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    // Relationship to category
    Public function category()
    {
        return $this->hasMany(Category::class, 'place_id');
    }

    // Relationship to company
    Public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
