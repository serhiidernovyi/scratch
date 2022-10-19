<?php

declare(strict_types=1);

namespace UseCases\Contracts\Requests\User;

interface IActivateUserRequest
{
    public function getUserId(): int;
}
