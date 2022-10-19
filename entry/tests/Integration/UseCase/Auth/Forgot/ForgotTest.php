<?php

namespace Tests\Integration\UseCase\Auth\Forgot;

use Event;
use Mockery as moc;
use Tests\TestCase;
use App\Models\User;
use Auth\AuthService;
use UseCases\Auth\Auth;
use App\Events\ForgotEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotTest extends TestCase
{
    use ForgotTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Successfully reset password
     *
     * @test
     */
    public function resetPassword_success_userHasDifferentPassword()
    {
        // GIVEN
        $user = $this->createUser();
        $request = $this->makeRequest();
        Event::fake();

        $tested_use_case = $this->app->make(Auth::class);

        // WHEN
        $tested_use_case->forgot($request);

        $user_updated = User::all()->first();

        // THEN
        $this->assertEquals('email@example.com', $user->email);
        $this->assertNotEquals($user_updated->password, $user->password);
        Event::assertDispatched(ForgotEvent::class, function ($e) {
            return ($e->user instanceof User);
        });
    }

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Successfully reset password
     *
     * @test
     */
    public function resetPassword_success_mockery()
    {
        // GIVEN
        $user = moc::mock(User::class);
        $user->shouldReceive('getAttribute')->with('password')->andReturn('password');
        $user_service = moc::mock(AuthService::class);
        $user_service->shouldReceive('forgot')->andReturn($user);
        $domain_service_factory = $this->getDomainServiceFactory($user_service);
        $password = 'password';
        $app_mock = $this->getAppMock($user, $password);

        $request = $this->mockRequest();

        // WHEN
        // THEN
        $tested_use_case = $this->app->make(Auth::class, ['domain_service_factory' => $domain_service_factory, 'app' => $app_mock]);
        $tested_use_case->forgot($request);
    }
}
