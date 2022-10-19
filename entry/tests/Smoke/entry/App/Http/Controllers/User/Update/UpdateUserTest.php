<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Update;

use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;
    use UpdateUserTrait;

    /**
     * @feature User
     * @scenario Update user list
     * @case Successfully update user
     *
     * @test
     */
    public function updateUser_goodRole_responseOk()
    {
        // GIVEN
        $user = $this->createUserAndBe();
        $credentials = $this->createCredentials();

        // WHEN
        $response = $this->json('PUT', route('user.update', ['user' => $user->id]), $credentials);

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @feature User
     * @scenario Update user list
     * @case Successfully update user
     *
     * @test
     */
    public function updateUser_goodRole_checkJson()
    {
        // GIVEN
        $user = $this->createUserAndBe();
        $credentials = $this->createCredentials();

        // WHEN
        $response = $this->json('PUT', route('user.update', ['user' => $user->id]), $credentials);

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
     * @scenario Update user list
     * @case Failed update user, no access
     *
     * @test
     */
    public function updateUser_noAccess_responseForbidden()
    {
        // GIVEN
        $user = $this->createUserAndBe('driver@email.com', 'DRIVER');
        $credentials = $this->createCredentials();

        // WHEN
        $response = $this->json('PUT', route('user.update', ['user' => $user->id]), $credentials);

        // THEN
        $this->assertEquals(403, $response->getStatusCode());
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Update user list
     * @case Failed update user, not logged
     *
     * @test
     */
    public function updateUser_notLogged_responseUnauthorized()
    {
        // GIVEN
        $user = $this->createUser();
        $credentials = $this->createCredentials();

        // WHEN
        $response = $this->json('PUT', route('user.update', ['user' => $user->id]), $credentials);

        // THEN
        $response->assertUnauthorized();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Update user list
     * @case Failed update user, not logged
     *
     * @test
     */
    public function updateUser_wrongId_responseNotFound()
    {
        // GIVEN
        $this->createUserAndBe();
        $credentials = $this->createCredentials();

        // WHEN
        $response = $this->json('PUT', route('user.update', ['user' => 99999]), $credentials);

        // THEN
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Update user list
     * @case Failed update user
     *
     * @dataProvider badRequests
     *
     * @param array $request
     *
     * @test
     */
    public function updateUser_wrongCredentials_responseUnprocessable($request)
    {
        // GIVEN
        $user = $this->createUserAndBe();

        // WHEN
        $response = $this->json('PUT', route('user.update', ['user' => $user->id]), $request);

        // THEN
        $this->assertEquals(422, $response->getStatusCode());
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}
