<?php

namespace Tests\Smoke\entry\App\Http\Controllers\Auth\Forgot;

trait ForgotTrait
{
    public function createCredentials($email = 'email@example.com')
    {
        return [
            'email' => $email,
        ];
    }
}
