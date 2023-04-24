<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    /**
     * Returns all the types that contain this question
     * @return BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany(Type::class)->withTimestamps();
    }

    /**
     * Returns all the answers of that question
     * @return HasMany
     */
    public function answers() : HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
