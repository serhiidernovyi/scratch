<?php

namespace Tests\Unit\Auth\Forgot;

use App\Http\Requests\Auth\ForgotRequest;

trait ForgotTrait
{
    public function makeRequest($email = 'email@example.com')
    {
        $request_data = [
            'email' => $email,
        ];

        return new ForgotRequest($request_data);
    }
}
