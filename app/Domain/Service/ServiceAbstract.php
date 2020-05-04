<?php

namespace Alvo\Domain\Service;

use Alvo\Domain\Component\Containers\RepositoryContainer;
use Alvo\Domain\Repository\Table\RefundRepository;
use Alvo\Domain\Repository\Table\UserRepository;

abstract class ServiceAbstract
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var RefundRepository
     */
    protected $refundRepository;

    public function __construct(RepositoryContainer $repositoryContainer)
    {
        $this->userRepository = $repositoryContainer->getRepository(UserRepository::class);
        $this->refundRepository = $repositoryContainer->getRepository(RefundRepository::class);
    }
}
