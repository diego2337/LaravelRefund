<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Repositories\BaseRepository;
use App\Domain\Models\User;

class UserRepository extends BaseRepository
{
    protected $model = User::class;
}
