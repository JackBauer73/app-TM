<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ['num_licence', 'name', 'surname', 'sexe', 'date_naissance', 'pts_classement'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
