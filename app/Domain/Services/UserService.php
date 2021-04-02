<?php

declare(strict_types=1);

namespace App\Domain\Services;

use Illuminate\Support\Collection;
use App\Domain\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Gets list of all users.
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->userRepository->all();
    }
}
