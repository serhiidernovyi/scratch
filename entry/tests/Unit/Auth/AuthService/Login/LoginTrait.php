<?php

namespace Tests\Unit\Auth\AuthService\Login;

use Mockery as moc;
use App\Models\User;
use Auth\LoggedDevice;
use Auth\Contracts\ILoggedDevice;
use App\Http\Requests\Auth\LoginRequest;
use UseCases\Contracts\Requests\Auth\ILoginRequest;

trait LoginTrait
{
    public function mockRequest()
    {
        $request = moc::mock(ILoginRequest::class);
        $request->shouldReceive('getEmail')->times(0);
        $request->shouldReceive('getUserPassword')->times(0);
        $this->instance(LoginRequest::class, $request);

        return $request;
    }

    public function mockUser($token)
    {
        $user = moc::mock(User::class);
        $user->shouldReceive('forceFill')->once();
        $user->shouldReceive('createToken')->andReturn($token);

        return $user;
    }

    public function mockAgent()
    {
        $device = moc::mock(LoggedDevice::class);
        $device->shouldReceive('getDevice')->once()->andReturn('some_name');
        $device->shouldReceive('isMobile')->once()->andReturnTrue();
        $this->instance(ILoggedDevice::class, $device);

        return $device;
    }
}
