<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combat extends Model
{
    use HasFactory;

    protected $fillable = ['character_id', 'health_point', 'armor_class', 'passive_perception', 'speed', 'initiative', 'spell_save_dc', 'spell_bonus', 'dices_of_life', 'proficiency'];
}
