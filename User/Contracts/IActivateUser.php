<?php

declare(strict_types=1);

namespace User\Contracts;

use UseCases\Contracts\Requests\User\IActivateUserRequest;

interface IActivateUser
{
    public function activate(IActivateUserRequest $user_id_provider);
}
