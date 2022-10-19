<?php

namespace Tests\Unit\User\Register;

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
        ];

        return new Register($request_data);
    }
    public function makeFullRequest($email = 'email@example.com', $password = 'Password1')
    {
        $request_data = [
            'name' => 'Some',
            'surname' => 'Name',
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,

            'role' => 'ADMIN',
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
