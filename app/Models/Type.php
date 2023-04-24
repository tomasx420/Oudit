<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    /**
     * Returns all the audits from that type
     * @return HasMany
     */
    public function audits() : HasMany
    {
        return $this->hasMany(Audit::class);
    }

    /**
     * Returns all the questions related to this type
     * @return BelongsToMany
     */
    public function questions() : BelongsToMany
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
