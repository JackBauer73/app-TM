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

    public function user()
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
