<?php

namespace Tests\Unit\User\ShowUsers;

use function app;
use App\Models\User;
use App\Http\Requests\User\UsersListRequest;

trait ShowUsersTrait
{
    public function createUsers()
    {
        $user_one = User::factory()->state([
            'name' => 'AAA',
            'surname' => 'CCC',
        ])->create();

        $user_two = User::factory()->state([
            'name' => 'CCC',
            'surname' => 'BBB',
        ])->create();

        $user_three = User::factory()->state([
            'name' => 'BBB',
            'surname' => 'AAA',
        ])->create();

        $user_four = User::factory()->state([
            'name' => 'ABC',
            'surname' => 'ABC',
        ])->create();

        $user_one->assign('MODERATOR');
        $user_two->assign('DRIVER');
        $user_three->assign('USER');
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
