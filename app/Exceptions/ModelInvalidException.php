<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Http\Response;

class ModelInvalidException extends BaseException
{
    public function getShortMessage()
    {
        return 'ModelInvalidException';
    }

    public function getDescription()
    {
        return $this->message;
    }

    public function getHttpStatus()
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }
}
