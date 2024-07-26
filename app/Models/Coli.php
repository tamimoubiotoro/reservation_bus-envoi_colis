<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coli extends Model
{
    use HasFactory;
}

// app/Models/Coli.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coli extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'poids',
        'statut',
        //'utilisateur_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
