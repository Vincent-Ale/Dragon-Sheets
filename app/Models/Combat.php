<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Combat extends Model
{
    use HasFactory;

    protected $fillable = ['character_id', 'health_point', 'armor_class', 'passive_perception', 'speed', 'initiative', 'spell_save_dc', 'spell_bonus', 'dices_of_life', 'spellcasting_ability', 'proficiency'];

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }

}
