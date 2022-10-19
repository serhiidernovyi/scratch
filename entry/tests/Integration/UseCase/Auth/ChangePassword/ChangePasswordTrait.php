<?php

namespace Tests\Integration\UseCase\Auth\ChangePassword;

use App\Http\Requests\Auth\ChangePasswordRequest;

trait ChangePasswordTrait
{
    public function makeRequest()
    {
        $request_data = [
            'old_password' => 'Password1',
            'password' => 'Password2',
        ];

        return new ChangePasswordRequest($request_data);
    }
}
