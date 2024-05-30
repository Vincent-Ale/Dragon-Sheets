<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'race', 'level', 'class', 'subclass_one', 'subclass_two', 'alignment', 'lore', 'notepad', 'image_path'
    ];

    /**
     * Get the skills for the character.
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function stats(): HasMany
    {
        return $this->hasMany(Stat::class);
    }

    public function combats(): HasMany
    {
        return $this->hasMany(Combat::class);
    }
}
