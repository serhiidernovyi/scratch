<?php

namespace Tests\Unit\Auth\Forgot;

use Auth\Forgot;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotTest extends TestCase
{
    use ForgotTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Login
     * @case Successfully reset password
     *
     * @test
     */
    public function forgot_goodRequest_instanceOfUser()
    {
        // GIVEN
        $user = $this->createUser();
        $request = $this->makeRequest();
        $tested_function = $this->app->make(Forgot::class);

        // WHEN
        $response = $tested_function->forgot($request);

        // THEN
        $this->assertInstanceOf(User::class, $response);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Successfully reset password
     *
     * @test
     */
    public function forgot_goodRequest_checkResponse()
    {
        // GIVEN
        $user = $this->createUser();
        $request = $this->makeRequest();
        $tested_function = $this->app->make(Forgot::class);

        // WHEN
        $response = $tested_function->forgot($request);

        // THEN
        $this->assertEquals($user->name, $response->name);
        $this->assertEquals($user->surname, $response->surname);
        $this->assertEquals($user->email, $response->email);
        $this->assertNotEquals($user->password, $response->password);
    }
}
