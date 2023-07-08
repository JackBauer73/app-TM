<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tableau;
use App\Models\User;


class Tournament extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'visible',
        'debut',
        'fin',
        'inscrit_debut',
        'inscrit_fin',
        'type_tournament',
        'max_simple',
        'max_double',
        'poster',
        'etat',

    ];
    // Relation avec le modèle User
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function tableau()
    {
        return $this->hasMany(Tableau::class);
    }
    public function dossard()
    {
        return $this->hasMany(Dossard::class);
    }
}
