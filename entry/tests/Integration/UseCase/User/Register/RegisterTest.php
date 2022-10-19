<?php

namespace Tests\Integration\UseCase\User\Register;

use Tests\TestCase;
use App\Models\User;
use UseCases\User\Register;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
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
    public function register_success_checkDispatcher()
    {
        // GIVEN
        $request = $this->makeRequest();
        Event::fake();

        $tested_use_case = $this->app->make(Register::class);

        // WHEN
        $tested_use_case->register($request);

        $user = User::all()->first();

        // THEN
        Event::assertDispatched(Registered::class, function ($e) {
            return ($e->user instanceof User);
        });
    }

    /**
     * @feature User
     * @scenario Register
     * @case Successfully register
     *
     * @test
     */
    public function register_success_checkDB()
    {
        // GIVEN
        $request = $this->makeRequest();
        Event::fake();

        $tested_use_case = $this->app->make(Register::class);

        // WHEN
        $tested_use_case->register($request);

        $user = User::all()->first();

        // THEN
        $this->assertEquals('email@example.com', $user->email);
        $this->assertEquals('Some', $user->name);
    }
}
