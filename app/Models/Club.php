<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['num_club', 'name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
