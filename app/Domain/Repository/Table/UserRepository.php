<?php

namespace Alvo\Domain\Repository\Table;

use Alvo\Domain\Model\Table\User;

class UserRepository extends RepositoryAbstract
{
    public function model()
    {
        return User::class;
    }
}
