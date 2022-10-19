<?php

namespace Tests\Integration\UseCase\User\Activate;

use Tests\TestCase;
use App\Models\User;
use UseCases\User\UserCase;
use App\Http\Requests\User\ActivateUserRequest;
use UseCases\Contracts\ResponseObjects\ISuccess;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActivateUserTest extends TestCase
{
    use RefreshDatabase;
    use ActivateUserTrait;

    /**
     * @feature User
     * @scenario Activate user
     * @case Successfully activate user
     *
     * @test
     */
    public function activate_success_checkResponse()
    {
        // GIVEN
        $user = $this->createDeletedUser();
        $tested_use_case = $this->app->make(UserCase::class);

        // WHEN
        $response = $tested_use_case->activate(new ActivateUserRequest(['user_id' => $user->id]));

        // THEN
        $this->assertInstanceOf(ISuccess::class, $response);
    }

    /**
     * @feature User
     * @scenario Activate user
     * @case Successfully activate user
     *
     * @test
     */
    public function activate_success_checkDB()
    {
        // GIVEN
        $user = $this->createDeletedUser();
        $tested_use_case = $this->app->make(UserCase::class);

        // WHEN
        $response = $tested_use_case->activate(new ActivateUserRequest(['user_id' => $user->id]));
        $user_result = $tested_use_case->showUsers($this->createRequestForShow([]));

        // THEN
        $this->assertDatabaseCount(User::class, 1);
        $this->assertEquals(null, $user_result->first()->daleted_at);
    }
}
