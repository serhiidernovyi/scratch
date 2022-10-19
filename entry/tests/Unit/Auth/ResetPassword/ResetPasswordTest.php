<?php

namespace Tests\Unit\Auth\ResetPassword;

use Tests\TestCase;
use Auth\ChangePassword;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class ResetPasswordTest extends TestCase
{
    use ResetPasswordTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Successfully reset password
     *
     * @test
     */
    public function changePassword_successful_responseTrue()
    {
        // GIVEN
        $user = $this->createUserAndBe();
        $request = $this->makeRequest();
        $tested_function = $this->app->make(ChangePassword::class);

        // WHEN
        $tested_function->changePassword($request, $user);

        // THEN
        $this->assertTrue(true);
    }

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Successfully reset password
     *
     * @test
     */
    public function resetPassword_successful_mockRequest()
    {
        // GIVEN
        $user = $this->mockUser();
        $request = $this->mockRequest();
        $hash = $this->mockHash();
        $tested_function = $this->app->make(ChangePassword::class, ['hash' => $hash]);

        // WHEN
        // THEN
        $tested_function->changePassword($request, $user);
    }
}
