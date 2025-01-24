<?php

namespace App\Policies;

use App\Models\User;

class VacantePolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Vacante $vacante)
    {
        return $user->id === $vacante->empleador_id;
    }
    
    public function delete(User $user, Vacante $vacante)
    {
        return $user->id === $vacante->empleador_id;
    }
    
}
