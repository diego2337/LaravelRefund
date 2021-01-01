<?php

namespace App\Repositories;

use App\Refund;
use App\User;

class RefundRepository
{
    /**
     * Get all refunds from a specific user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Refund::where('userId', $user->id)->orderBy('created_at', 'asc')->get();
    }
}
