<?php

namespace Tests\Unit\Auth\AuthService\ChangePassword;

use Mockery as moc;
use Tests\TestCase;
use Auth\AuthService;
use Auth\ChangePassword;
use Auth\Contracts\IChangePassword;
use UseCases\Contracts\ResponseObjects\ISuccess;

class ChangePasswordTest extends TestCase
{
    use ChangePasswordTrait;
    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Success reset password
     *
     * @test
     */
    public function changePassword_success_responseISuccess()
    {
        // GIVEN
        $user = $this->mockChangeUser();
        $request = $this->mockChangeRequest();

        $chang = moc::mock(IChangePassword::class);
        $chang->shouldReceive('changePassword')->once();
        $this->instance(ChangePassword::class, $chang);

        $tested_function = $this->app->make(AuthService::class);

        // WHEN
        $response = $tested_function->changePassword($request, $user);

        // THEN
        $this->assertInstanceOf(ISuccess::class, $response);
    }
}
