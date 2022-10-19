<?php

namespace Tests\Unit\Auth\AuthService\Login;

use Auth\Login;
use Mockery as moc;
use Tests\TestCase;
use App\Models\User;
use Auth\AuthService;
use Auth\Contracts\ILogin;
use App\Models\Other\BadMessages;
use Laravel\Sanctum\NewAccessToken;
use UseCases\Contracts\ResponseObjects\IError;

class LoginTest extends TestCase
{
    use LoginTrait;

    /**
     * @feature Auth
     * @scenario Login
     * @case Success login user
     *
     * @test
     */
    public function login_success_responseInstanceOfUser()
    {
        // GIVEN
        $token = moc::mock(NewAccessToken::class);
        $token->plainTextToken = 'token_text';

        $user = $this->mockUser($token);
        $request = $this->mockRequest();

        $register = moc::mock(ILogin::class);
        $register->shouldReceive('loginUser')->once()->andReturn($user);
        $this->instance(Login::class, $register);

        $device = $this->mockAgent();

        $tested_function = $this->app->make(AuthService::class, ['device' => $device]);

        // WHEN
        $response = $tested_function->login($request);

        // THEN
        $this->assertInstanceOf(User::class, $response);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Failed login
     *
     * @test
     */
    public function login_responseInstanceOfError()
    {
        // GIVEN
        $request = $this->mockRequest();
        $register = moc::mock(ILogin::class);
        $register->shouldReceive('loginUser')->once()->andReturnNull();
        $this->instance(Login::class, $register);

        $tested_function = $this->app->make(AuthService::class);

        // WHEN
        $response = $tested_function->login($request);

        // THEN
        $this->assertEquals(BadMessages::INVALID_USER_CREDENTIALS, $response->message);
        $this->instance(IError::class, $response);
    }
}
