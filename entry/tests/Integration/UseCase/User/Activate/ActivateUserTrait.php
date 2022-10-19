<?php

namespace Tests\Integration\UseCase\User\Activate;

use function app;
use App\Http\Requests\User\UsersListRequest;

trait ActivateUserTrait
{
    protected function createRequestForShow(array $data): UsersListRequest
    {
        $request = new UsersListRequest($data);
        $request
            ->setContainer(app())
            ->validateResolved();

        return $request;
    }
}
