<?php

declare(strict_types=1);

namespace App\Exceptions;

class BuildExceptions extends \Exception
{
    protected $exception;
    protected $message;

    public function __construct(DomainExceptions $exception)
    {
        $this->exception = $exception;
        $this->message   = $exception->getMessageForHumans();
        $this->code      = $exception->getHttpCode();
        parent::__construct();
    }

    public function render()
    {
        return response()->json($this->exception->toArray(), $this->exception->getHttpCode() ?? 500);
    }
}
