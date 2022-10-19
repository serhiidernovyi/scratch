<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Update;

trait UpdateUserTrait
{
    public function createCredentials()
    {
        return [
            'name' => 'Some',
            'surname' => 'Name',
            'roles' => ['ADMIN'],
            'phone' => '81500000',
            'postal_code' => '0010',
            'city' => 'Oslo',
            'street' => 'street',
            'bank_account' => '1234567890',
            'social_security' => '0000000000',
            'salary_per_hour' => '26.5',
        ];
    }

    public function badRequests()
    {
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
                    'role' => 'ADMIN',
                    'phone' => '12345678',
                ],
            ],
            'surname is not set' => [
                [
                    'name' => 'Name',
                    'role' => 'ADMIN',
                    'phone' => '12345678',
                ],
            ],
            'role is not set' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'phone' => '12345678',
                ],
            ],
            'role is wrong' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'roles' => ['WRONG'],
                    'phone' => '12345678',
                ],
            ],
            'phone is short' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'roles' => ['DRIVER'],
                    'phone' => '1234567',
                ],
            ],
            'postal_code is large' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'roles' => ['DRIVER'],
                    'phone' => '12345678',
                    'postal_code' => '123456',
                ],
            ],
            'city is short' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'roles' =>['DRIVER'],
                    'phone' => '12345678',
                    'postal_code' => '1234',
                    'city' => 'C',
                ],
            ],
            'street is short' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'roles' => ['USER'],
                    'phone' => '12345678',
                    'postal_code' => '1234',
                    'street' => 'S',
                ],
            ],
            'bank_account is short' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'roles' => ['USER'],
                    'phone' => '12345678',
                    'postal_code' => '1234',
                    'bank_account' => 'B',
                ],
            ],
            'social_security is short' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'roles' => ['ADMIN'],
                    'phone' => '12345678',
                    'postal_code' => '1234',
                    'social_security' => 'S',
                ],
            ],
            'salary_per_hour is short' => [
                [
                    'name' => 'Name',
                    'surname' => 'Surname',
                    'roles' => ['ADMIN'],
                    'phone' => '12345678',
                    'postal_code' => '1234',
                    'salary_per_hour' => 'string',
                ],
            ],
        ];
    }
}
