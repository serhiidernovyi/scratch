<?php

namespace Tests\Unit\User\UserService;

use Tests\TestCase;
use App\Models\User;
use User\UserService;
use App\Models\Other\RoleType;
use Illuminate\Pagination\LengthAwarePaginator;
use UseCases\Contracts\ResponseObjects\ISuccess;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserServiceTest extends TestCase
{
    use UserServiceTrait;
    use RefreshDatabase;

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list
     *
     * @test
     */
    public function success_updateUser()
    {
        // GIVEN
        $user = $this->createUserAndBe();
        $credentials = $this->createUpdateCredentials();

        $tested_function = $this->app->make(UserService::class);

        // WHEN
        $response = $tested_function->update($credentials, $user);

        // THEN
        $user = User::get()->first();
        $this->assertInstanceOf(User::class, $response);
        $this->assertDatabaseCount(User::class, 1);
        $this->assertEquals('Some', $user->name);
        $this->assertEquals('Name', $user->surname);
        $this->assertEquals('81500000', $user->phone);
        $this->assertEquals('0010', $user->postal_code);
        $this->assertEquals('Oslo', $user->city);
        $this->assertEquals('street', $user->street);
        $this->assertEquals('1234567890', $user->bank_account);
        $this->assertEquals('0000000000', $user->social_security);
        $this->assertEquals('26.50', $user->salary_per_hour);
        $this->assertEquals(RoleType::USER, $user->getRoles()->first());
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, sort by name DESC
     *
     * @test
     */
    public function success_showUsersList_sortByNameDESC()
    {
        // GIVEN
        $this->createUserAndBe();

        $request = $this->createRequest([]);

        $tested_function = $this->app->make(UserService::class);

        // WHEN
        $response = $tested_function->showUsers($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(1, $response->count());
    }

    /**
     * @feature User
     * @scenario Delete user list
     * @case Successfully delete user
     *
     * @test
     */
    public function success_deleteUser()
    {
        // GIVEN
        $user = $this->createUserAndBe();

        $tested_function = $this->app->make(UserService::class);

        // WHEN
        $response = $tested_function->delete($user);

        // THEN
        $this->assertInstanceOf(ISuccess::class, $response);
        $this->assertSoftDeleted('users', ['id' => $user->id]);
        $this->assertDatabaseCount(User::class, 1);
    }
}
