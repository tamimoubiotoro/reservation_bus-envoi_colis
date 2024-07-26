<?php

namespace App\Policies;

use App\Models\Colis;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ColisPolicy
{
    public function viewAny(User $user)
    {
        return $user->isControleur();
    }

    public function view(User $user, Colis $colis)
    {
        return $user->isControleur();
    }

    public function create(User $user)
    {
        return $user->isControleur();
    }

    public function update(User $user, Colis $colis)
    {
        return $user->isControleur();
    }

    public function delete(User $user, Colis $colis)
    {
        return $user->isControleur();
    }
}
