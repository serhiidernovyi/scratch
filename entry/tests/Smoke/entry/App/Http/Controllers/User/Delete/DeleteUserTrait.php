<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Delete;

trait DeleteUserTrait
{
    public function badRoles()
    {
        return [
            'user' => [
                ['USER'],
            ],
            'moderator' => [
                ['MODERATOR'],
            ],
        ];
    }
}
