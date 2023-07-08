<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['num_club', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tableau()
    {
        return $this->hasMany(Tableau::class);
    }
}
