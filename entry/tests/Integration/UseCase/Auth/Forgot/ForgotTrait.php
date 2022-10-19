<?php

namespace Tests\Integration\UseCase\Auth\Forgot;

use Mockery as moc;
use App\Models\User;
use Auth\AuthService;
use App\Events\ForgotEvent;
use UseCases\Contracts\Auth\IAuth;
use UseCases\DomainServiceFactory;
use Illuminate\Foundation\Application;
use App\Http\Requests\Auth\ForgotRequest;
use UseCases\Contracts\Requests\Auth\IForgotRequest;

trait ForgotTrait
{
    public function makeRequest($email = 'email@example.com')
    {
        $request_data = [
            'email' => $email,
        ];

        return new ForgotRequest($request_data);
    }

    private function getDomainServiceFactory(AuthService $user_service)
    {
        $domain_service_factory = moc::mock(DomainServiceFactory::class);
        $domain_service_factory->shouldReceive('create')
            ->once()
            ->with(IAuth::class)
            ->andReturn($user_service);
        return $domain_service_factory;
    }

    private function getAppMock(User $user, string $password)
    {
        $event = moc::mock(ForgotEvent::class);
        $app_mock = moc::mock(Application::class);
        $app_mock->shouldReceive('make')
            ->once()
            ->with('events')
            ->andReturnSelf();
        $app_mock->shouldReceive('dispatch')
            ->once()
            ->with($event);
        $app_mock->shouldReceive('makeWith')
            ->once()
            ->with(ForgotEvent::class, ['user' => $user, 'password' => $password])
            ->andReturn($event);
        return $app_mock;
    }

    public function mockRequest()
    {
        $request = moc::mock(IForgotRequest::class);
        $request->shouldReceive('getEmail')->andReturn('test@test.com');
        $this->instance(ForgotRequest::class, $request);

        return $request;
    }
}
