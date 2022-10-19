<?php

namespace Tests\Unit\Auth\Login;

use Auth\Login;
use Tests\TestCase;
use App\Models\User;
use UseCases\Contracts\ResponseObjects\IError;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use LoginTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Login
     * @case Successfully login
     *
     * @test
     */
    public function loginUser_goodRequest_responseInstanceOfUser()
    {
        // GIVEN
        $user = $this->createUser();
        $request = $this->makeRequest();
        $tested_function = $this->app->make(Login::class);

        // WHEN
        $response = $tested_function->loginUser($request);

        // THEN
        $this->assertInstanceOf(User::class, $response);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Successfully login
     *
     * @test
     */
    public function loginUser_goodRequest_checkResponseUser()
    {
        // GIVEN
        $user = $this->createUser();
        $request = $this->makeRequest();
        $tested_function = $this->app->make(Login::class);

        // WHEN
        $response = $tested_function->loginUser($request);

        // THEN
        $this->assertEquals($user->name, $response->name);
        $this->assertEquals($user->surname, $response->surname);
        $this->assertEquals($user->email, $response->email);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Failed login
     *
     * @test
     */
    public function loginUser_notExistsUser_responseInstanceOfIError()
    {
        // GIVEN
        $request = $this->makeRequest();
        $tested_function = $this->app->make(Login::class);

        // WHEN
        $response = $tested_function->loginUser($request);

        // THEN
        $this->assertInstanceOf(IError::class, $response);
    }
}
