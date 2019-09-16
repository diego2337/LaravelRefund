<?php

namespace App\Repositories;

use App\Refund;
use App\Usuario;

class RefundRepository
{
    /**
     * Get all refunds from a specific user.
     *
     * @param  Usuario  $user
     * @return Collection
     */
    public function forUser(Usuario $user)
    {
        return Refund::where('userId', $user->id)->orderBy('created_at', 'asc')->get();
    }
}