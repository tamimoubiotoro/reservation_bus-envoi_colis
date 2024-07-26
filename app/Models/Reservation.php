<?php


// app/Models/Reservation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trajet_id',
        'place',
        'statut',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }
}
