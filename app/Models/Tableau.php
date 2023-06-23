<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tableau extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_tableau',
        'max_joueurs',
        'prix_tournoi',
        'heure',
        'date',
        'points_mini',
        'points_max',
        'type_tableau',
        'visible_tab',
        'colors',

        // Ajoute les autres attributs du tableau
    ];
    // Relation avec le modèle Tournament
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }


}
