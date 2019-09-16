<?php

namespace App\Repositories;

use App\Usuario;

class UsuarioRepository
{
    /**
     * Get all users.
     *
     * @return Collection
     */
    public function allUsers()
    {
        return Usuario::orderBy('name', 'asc')->get();
    }
}