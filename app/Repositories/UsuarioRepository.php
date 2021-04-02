<?php

namespace App\Repositories;

use App\User;

class UsuarioRepository
{
    /**
     * Get all users.
     *
     * @return Collection
     */
    public function allUsers()
    {
        return User::orderBy('name', 'asc')->get();
    }
}
