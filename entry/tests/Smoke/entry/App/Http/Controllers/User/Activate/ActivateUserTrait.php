<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Activate;

trait ActivateUserTrait
{
    public function badRoles()
    {
        return [
            'driver' => [
                ['DRIVER'],
            ],
            'moderator' => [
                ['MODERATOR'],
            ],
            'user' => [
                ['USER'],
            ],
        ];
    }
}
