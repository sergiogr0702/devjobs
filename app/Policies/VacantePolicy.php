<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Vacante;
use App\Models\User;

class VacantePolicy
{


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacante $vacante): bool
    {
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacante $vacante): bool
    {
        return true;
    }
}
