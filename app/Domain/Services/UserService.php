<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Models\User;
use Illuminate\Support\Collection;
use App\Domain\Repositories\UserRepository;
use App\Exceptions\UserExceptions;

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

    /**
     * Get user by id.
     * @param int $id
     * @return User
     */
    public function show(int $id): User
    {
        $user = $this->userRepository->find($id);
        if ($user) {
            return $user;
        } else {
            UserExceptions::userNotFound();
        }
    }
}
