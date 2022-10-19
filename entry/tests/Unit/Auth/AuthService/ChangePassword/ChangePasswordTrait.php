<?php

namespace Tests\Unit\Auth\AuthService\ChangePassword;

use Mockery as moc;
use App\Models\User;
use App\Http\Requests\Auth\ChangePasswordRequest;
use UseCases\Contracts\Requests\Auth\IChangeRequest;

trait ChangePasswordTrait
{
    public function mockChangeUser()
    {
        $user = moc::mock(User::class);
        $user->shouldReceive('tokens->delete')->once();
        $this->instance(User::class, $user);

        return $user;
    }

    public function mockChangeRequest()
    {
        $request = moc::mock(IChangeRequest::class);
        $request->shouldReceive('getUserPassword')->times(0);
        $this->instance(ChangePasswordRequest::class, $request);

        return $request;
    }
}
