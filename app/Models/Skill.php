<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['character_id', 'name', 'value', 'proficiency', 'expertise'];

    /**
     * Get the character that owns the skill.
     */
    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }
}
