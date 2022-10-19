<?php

namespace Tests\Integration\UseCase\User\Register;

use App\Http\Requests\User\Register;

trait RegisterTrait
{
    public function makeRequest($email = 'email@example.com')
    {
        $request_data = [
            'name' => 'Some',
            'surname' => 'Name',
            'email' => $email,
            'password' => 'Password1',
            'password_confirmation' => 'Password1',

            'roles' => ['ADMIN', 'DRIVER'],
            'phone' => '81500000',
            'postal_code' => '0010',
            'city' => 'Oslo',
            'street' => 'street',
            'bank_account' => '1234567890',
            'social_security'=> '0000000000',
            'salary_per_hour' => '26.5',
        ];

        return new Register($request_data);
    }
}
