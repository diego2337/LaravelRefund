<?php

namespace App\Http\Controllers;

use Alvo\Domain\Component\Containers\ServiceContainer;
use Alvo\Domain\Model\Table\User;
use Alvo\Domain\Service\RefundService;
use Alvo\Domain\Service\UserService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class ControllerAbstract extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var RefundService
     */
    protected $refundService;

    public function __construct(ServiceContainer $serviceContainer)
    {
        $this->response = [
            'type'    => 'success',
            'message' => '',
            'data'    => []
        ];

        $this->userService = $serviceContainer->getService(UserService::class);
        $this->refundService = $serviceContainer->getService(RefundService::class);
    }
}
