<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['character_id', 'acrobatics', 'arcana', 'athletics', 'discretion', 'animal_handling', 'sleight_of_hand', 'history', 'intimidation', 'investigation', 'medicine', 'nature', 'perception', 'insight', 'persuasion', 'religion', 'performance', 'survival', 'deception'];
}
