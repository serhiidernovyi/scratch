<?php

namespace Tests\Integration\UseCase\Auth\Login;

use Tests\TestCase;
use UseCases\Auth\Auth;
use UseCases\Contracts\ResponseObjects\IError;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use LoginTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Login
     * @case Successfully login
     *
     * @test
     */
    public function loginUser_success()
    {
        // GIVEN
        $right_email = 'email@example.com';
        $right_password = 'Password1';
        $user = $this->createUser($right_email);
        $request = $this->makeRequest($right_email, $right_password);

        $tested_use_case = $this->app->make(Auth::class);

        // WHEN
        $token = $tested_use_case->login($request);

        // THEN
        $this->assertCount(1, $user->tokens()->get());
        $this->assertNotNull($token);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Failed login, wrong email
     *
     * @expectation Invalid email (username) detected
     *
     * @test
     */
    public function loginUser_wrongEmail_instanceOfError()
    {
        // GIVEN
        $right_email = 'email@example.com';
        $right_password = 'Password1';
        $user = $this->createUser($right_email);
        $wrong_email = 'email_@example.com';
        $request = $this->makeRequest($wrong_email, $right_password);

        $tested_use_case = $this->app->make(Auth::class);

        // WHEN
        $token = $tested_use_case->login($request);

        // THEN
        $this->assertCount(0, $user->tokens()->get());
        $this->assertInstanceOf(IError::class, $token);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Failed login
     *
     * @expectation Invalid password detected
     *
     * @test
     */
    public function loginUser_wrongPassword_instanceOfError()
    {
        // GIVEN
        $right_email = 'email@example.com';
        $user = $this->createUser($right_email);
        $wrong_password = 'password1';
        $request = $this->makeRequest($right_email, $wrong_password);

        $tested_use_case = $this->app->make(Auth::class);

        // WHEN
        $token = $tested_use_case->login($request);

        // THEN
        $this->assertCount(0, $user->tokens()->get());
        $this->assertInstanceOf(IError::class, $token);
    }
}
