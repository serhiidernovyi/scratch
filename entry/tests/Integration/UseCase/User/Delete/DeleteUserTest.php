<?php

namespace Tests\Integration\UseCase\User\Delete;

use Tests\TestCase;
use App\Models\User;
use UseCases\User\UserCase;
use UseCases\Contracts\ResponseObjects\ISuccess;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @feature User
     * @scenario Delete user
     * @case Successfully delete user
     *
     * @test
     */
    public function delete_success_checkResponse()
    {
        // GIVEN
        $user = $this->createUser();
        $tested_use_case = $this->app->make(UserCase::class);

        // WHEN
        $response = $tested_use_case->delete($user);

        // THEN
        $this->assertInstanceOf(ISuccess::class, $response);
    }

    /**
     * @feature User
     * @scenario Delete user
     * @case Successfully delete user
     *
     * @test
     */
    public function delete_success_checkDB()
    {
        // GIVEN
        $user = $this->createUser();
        $tested_use_case = $this->app->make(UserCase::class);

        // WHEN
        $response = $tested_use_case->delete($user);

        // THEN
        $this->assertSoftDeleted('users', ['id' => $user->id]);
        $this->assertDatabaseCount(User::class, 1);
    }
}
