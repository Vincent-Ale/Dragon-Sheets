<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = ['character_id', 'strenght', 'dexterity', 'intelligence', 'constitution', 'charisma', 'wisdom'];
}
