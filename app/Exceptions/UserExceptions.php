<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Http\Response;

class UserExceptions extends BuildExceptions
{
    public static function userNotFound(): DomainExceptions
    {
        $userNotFound = new DomainExceptions(
            'Error',
            trans('exceptions.user.not_found'),
            trans('support.user.not_found'),
            Response::HTTP_NOT_FOUND
        );
        throw new BuildExceptions($userNotFound);
    }
}
