<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossard extends Model
{
    use HasFactory;
    protected $fillable = [
        'tournament_id',
        'player_id',
        'numero_dossard',
        'etat',


        // Ajoute les autres attributs du tableau
    ];
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function player()
    {
        return $this->belongsTo(User::class);
    }
    public function inscription()
    {
        return $this->hasMany(Inscription::class);
    }
}
