<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Register;

use App\Models\User;

trait RegisterTrait
{
    public function createCredentials($email = 'email@example.com', $password = 'Password1')
    {
        return [
            'name' => 'Some',
            'surname' => 'Name',
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,

            'roles' => ['ADMIN'],
            'phone' => '81500000',
            'postal_code' => '0010',
            'city' => 'Oslo',
            'street' => 'street',
            'bank_account' => '1234567890',
            'social_security'=> '0000000000',
            'salary_per_hour' => '26.5',
        ];
    }

    public function createMinCredentials($email = 'email@example.com', $password = 'Password1')
    {
        return [
            'name' => 'Some',
            'surname' => 'Name',
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
            'roles' => ['ADMIN'],
        ];
    }

    public function createRolesCredentials($email = 'email@example.com', $password = 'Password1')
    {
        return [
            'name' => 'Some',
            'surname' => 'Name',
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
            'roles' => ['ADMIN'],
        ];
    }
    public function createOneUser($email = 'email@example.com')
    {
        return User::factory()->state([
            'email' => $email,
        ])->create();
    }

    public function badRequests()
    {
        $email = "email@example.com";
        $password = "Password1";
        return [
            'empty' => [
                [],
            ],
            'null' => [
                [null],
            ],
            'name is not set' => [
                [
                    'surname' => 'Surname',
                    'email' => $email,
                    'password' => $password,
                    'password_confirmation' => $password,
                ],
            ],
            'surname is not set' => [
                [
                    'name' => 'Name',
                    'email' => $email,
                    'password' => $password,
                    'password_confirmation' => $password,
                ],
            ],
            'email is not set' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'password' => $password,
                    'password_confirmation' => $password,
                ],
            ],
            'wrong email with out @' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'email' => 'emailexample.com',
                    'password' => $password,
                    'password_confirmation' => $password,
                ],
            ],
            'wrong email with out .com' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'email' => 'email@example',
                    'password' => $password,
                    'password_confirmation' => $password,
                ],
            ],
            'no roles given' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'email' => 'email@example.com',
                    'password' => $password,
                    'password_confirmation' => $password,
                    'roles' => [],
                ],
            ],
            'wrong role given' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'email' => 'email@example.com',
                    'password' => $password,
                    'password_confirmation' => $password,
                    'roles' => ['SOME_TEXT'],
                ],
            ],
        ];
    }
}
