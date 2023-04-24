<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Audit extends Model
{
    protected $fillable = ['name', 'type_id', 'user_id'];

    use HasFactory;

    /**
     * Returns the user that has created the audits
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the type of the audits
     * @return BelongsTo
     */
    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * All the answers for the audits
     * @return HasMany
     */
    public function answers() : HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
