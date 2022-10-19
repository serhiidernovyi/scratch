<?php

namespace Tests\Integration\UseCase\Auth\ChangePassword;

use Tests\TestCase;
use UseCases\Auth\Auth;
use UseCases\Contracts\ResponseObjects\ISuccess;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use ChangePasswordTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Change Password
     * @case Successfully change password
     *
     * @test
     */
    public function changePassword_successfully_instanceSuccess()
    {
        // GIVEN
        $user = $this->createUserAndBe();
        $request = $this->makeRequest();
        $tested_use_case = $this->app->make(Auth::class);

        // WHEN
        $response = $tested_use_case->changePassword($request, $user);

        // THEN
        $this->assertInstanceOf(ISuccess::class, $response);
    }
}
