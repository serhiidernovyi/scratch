<?php

namespace Tests\Smoke\entry\App\Http\Controllers\Auth\ChangePassword;

trait ChangePasswordTrait
{
    public function createCredentials($old_password, $password, $password_confirmed)
    {
        return [
            'old_password' => $old_password,
            'password' => $password,
            'password_confirmation' => $password_confirmed,
        ];
    }

    public function badRequests422()
    {
        return [

            'passwords same' => [
                [
                    'old_password' => 'Password1',
                    'password' => 'Password1',
                    'password_confirmation' => 'Password1',
                ],
            ],
            'password not confirmed' => [
                [
                    'old_password' => 'Password1',
                    'password' => 'Password2',
                    'password_confirmation' => 'Password1',
                ],
            ],
            'new password with out upper' => [
                [
                    'old_password' => 'Password1',
                    'password' => 'password1',
                    'password_confirmation' => 'password1',
                ],
            ],
            'new password with out number' => [
                [
                    'old_password' => 'Password1',
                    'password' => 'Password',
                    'password_confirmation' => 'Password',
                ],
            ],
            'new password too short' => [
                [
                    'old_password' => 'Password1',
                    'password' => 'Pas1',
                    'password_confirmation' => 'Pas1',
                ],
            ],
        ];
    }

    public function badRequests403()
    {
        return [
            'empty' => [
                [],
            ],
            'null' => [
                [null],
            ],
            'old password is not set' => [
                [
                    'password' => 'Password1',
                    'password_confirmation' => 'Password1',
                ],
            ],
            'wrong old password' => [
                [
                    'old_password' => 'wrongPassword',
                    'password' => 'Password1',
                    'password_confirmation' => 'Password1',
                ],
            ],
        ];
    }
}
