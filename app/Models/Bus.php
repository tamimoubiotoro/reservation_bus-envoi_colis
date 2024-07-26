<?php

// app/Models/Bus.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'numero', 'capacite'];

    public function horaires()
    {
        return $this->hasMany(Horaire::class);
    }
}

