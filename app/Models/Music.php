<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    // Indiquer le nom de la table si ce n'est pas le pluriel du nom du modèle
    protected $table = 'musics';

    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = ['user_id', 'name', 'tag', 'music_path'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}