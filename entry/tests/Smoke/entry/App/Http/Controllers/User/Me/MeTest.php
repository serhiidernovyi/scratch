<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Me;

use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @feature User
     * @scenario show logged user
     * @case success show logged user
     *
     * @test
     */
    public function me_goodRole_responseOk()
    {
        // GIVEN
        $this->createUserAndBe();

        // WHEN
        $response = $this->json('GET', route('user.me'));

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @feature User
     * @scenario show logged user
     * @case success show logged user
     *
     * @test
     */
    public function me_goodRole_checkJson()
    {
        // GIVEN
        $this->createUserAndBe();

        // WHEN
        $response = $this->json('GET', route('user.me'));

        // THEN
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'surname',
                'email',
                'phone',
                'postal_code',
                'city',
                'street',
                'bank_account',
                'social_security',
                'salary_per_hour',
                'roles',
            ],
        ]);
    }

    /**
     * @feature User
     * @scenario show logged user
     * @case failed show logged user
     *
     * @test
     */
    public function me_userNotLogin_responseUnauthorized()
    {
        // GIVEN
        $this->createUser();

        // WHEN
        $response = $this->json('GET', route('user.me'));

        // THEN
        $response->assertUnauthorized();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}
