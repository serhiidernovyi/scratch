<?php

namespace Tests\Unit\Auth\ResetPassword;

use Mockery as moc;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\ChangePasswordRequest;
use UseCases\Contracts\Requests\Auth\IChangeRequest;

trait ResetPasswordTrait
{
    public function makeRequest()
    {
        $request_data = [
            'old_password' => 'Password1',
            'password' => 'Password2',
            'password_confirmation' => 'Password2',
        ];

        return new ChangePasswordRequest($request_data);
    }

    public function mockUser()
    {
        $user = moc::mock(User::class);
        $user->shouldReceive('forceFill')->once()->andReturnSelf();
        $user->shouldReceive('update')->once()->andReturnTrue();
        $this->instance(User::class, $user);

        return $user;
    }

    public function mockRequest()
    {
        $request = moc::mock(IChangeRequest::class);
        $request->shouldReceive('getUserPassword')->andReturn('password');
        $this->instance(ChangePasswordRequest::class, $request);

        return $request;
    }

    public function mockHash()
    {
        $hash = moc::mock('alias:' . Hash::class);
        $hash->shouldReceive('make')->once()->andReturn('#password');
        return $hash;
    }
}
