<?php

namespace Tests\Unit\User\UserService;

use function app;
use App\Http\Requests\User\UsersListRequest;
use App\Http\Requests\User\UpdateUserRequest;

trait UserServiceTrait
{
    public function createUpdateCredentials()
    {
        $request_data = [
            'name' => 'Some',
            'surname' => 'Name',
            'roles' => ['USER'],
            'phone' => '81500000',
            'postal_code' => '0010',
            'city' => 'Oslo',
            'street' => 'street',
            'bank_account' => '1234567890',
            'social_security' => '0000000000',
            'salary_per_hour' => '26.50',
        ];

        return new UpdateUserRequest($request_data);
    }

    public function createRequest(array $data): UsersListRequest
    {
        $request = new UsersListRequest($data);
        $request
            ->setContainer(app())
            ->validateResolved();

        return $request;
    }
}
