<?php

namespace Tests\Unit\User\Register;

use User\Register;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use RegisterTrait;

    /**
     * @feature User
     * @scenario Register
     * @case Successfully register
     *
     * @test
     */
    public function success_registerUser()
    {
        // GIVEN
        $request = $this->makeRequest();
        $tested_function = $this->app->make(Register::class);

        // WHEN
        /** @var User $response */
        $response = $tested_function->registerUser($request);

        // THEN
        $this->assertInstanceOf(User::class, $response);
        $this->assertEquals('Some', $response->name);
        $this->assertEquals('email@example.com', $response->email);
    }

    /**
     * @feature User
     * @scenario Register
     * @case Successfully register, full data
     *
     * @test
     */
    public function success_registerUser_fullData()
    {
        // GIVEN
        $request = $this->makeFullRequest();
        $tested_function = $this->app->make(Register::class);

        // WHEN
        /** @var User $response */
        $response = $tested_function->registerUser($request);

        // THEN
        $this->assertInstanceOf(User::class, $response);
        $this->assertEquals('Some', $response->name);
        $this->assertEquals('81500000', $response->phone);
        $this->assertEquals('0010', $response->postal_code);
        $this->assertEquals('Oslo', $response->city);
        $this->assertEquals('street', $response->street);
        $this->assertEquals('1234567890', $response->bank_account);
        $this->assertEquals('0000000000', $response->social_security);
        $this->assertEquals('26.5', $response->salary_per_hour);
    }
}
