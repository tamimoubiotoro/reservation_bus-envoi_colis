<?php

// app/Models/Horaire.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    protected $fillable = ['depart', 'arrivee', 'heure_depart', 'heure_arrivee', 'bus_id'];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}

