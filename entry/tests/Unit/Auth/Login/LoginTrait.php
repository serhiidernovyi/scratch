<?php

namespace Tests\Unit\Auth\Login;

use Mockery as moc;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use UseCases\Contracts\Requests\Auth\ILoginRequest;

trait LoginTrait
{
    public function makeRequest($email = 'email@example.com')
    {
        $request_data = [
            'email' => $email,
            'password' => 'Password1',
        ];

        return new LoginRequest($request_data);
    }
    public function mockUser()
    {
        $user = moc::mock(User::class);
        $user->shouldReceive('where->first')->andReturn($user);
        $user->shouldReceive('tokens->delete')->once();
        $user->shouldReceive('getAttribute')->once()->andReturn('Password1');
        return $user;
    }

    public function mockFailedUser()
    {
        $user = moc::mock(User::class);
        $user->shouldReceive('where->first')->andReturn($user);
        $user->shouldReceive('getAttribute')->once()->andReturn('Password1');
        return $user;
    }

    public function mockRequest()
    {
        $request = moc::mock(ILoginRequest::class);
        $request->shouldReceive('getEmail')->andReturn('email@email.com');
        $request->shouldReceive('getUserPassword')->andReturn('Password1');
        $this->instance(LoginRequest::class, $request);

        return $request;
    }

    public function mockHashReturnTrue()
    {
        $hash = moc::mock('alias:' . Hash::class);
        $hash->shouldReceive('check')->andReturnTrue();
        return $hash;
    }

    public function mockHashReturnFalse()
    {
        $hash = moc::mock('alias:' . Hash::class);
        $hash->shouldReceive('check')->andReturnFalse();
        return $hash;
    }

    public function mockUserNotFound()
    {
        $user = moc::mock(User::class);
        $user->shouldReceive('where->first')->andReturn(null);
        return $user;
    }
}
