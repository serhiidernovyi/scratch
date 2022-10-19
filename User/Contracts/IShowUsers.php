<?php

declare(strict_types=1);

namespace User\Contracts;

use UseCases\Contracts\User\IUsersListRequest;

interface IShowUsers
{
    public function show(IUsersListRequest $query_param);
}
