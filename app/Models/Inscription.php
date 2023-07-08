<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'dossards_id',
        'tableaus_id',
        'present',


        // Ajoute les autres attributs du tableau
    ];
    public function dossard()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function tableau()
    {
        return $this->belongsTo(User::class);
    }
}
