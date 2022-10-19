<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Activate;

use function route;
use Tests\TestCase;
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
    public function activateUser_goodRole_responseOk()
    {
        // GIVEN
        $this->createUserAndBe();
        $user = $this->createDeletedUser();

        // WHEN
        $response = $this->json('PUT', route('user.activate', ['user_id' => $user->id]));

        // THEN
        $response->assertOk();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Activate user
     * @case Failed activate user, activate wrong id
     *
     * @test
     */
    public function activateUser_wrongId_responseNotFound()
    {
        // GIVEN
        $this->createUserAndBe();

        // WHEN
        $response = $this->json('PUT', route('user.activate', ['user_id' => -1]));

        // THEN
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Activate user
     * @case Failed activate user, no permission
     *
     * @dataProvider badRoles
     *
     * @param array $request
     *
     * @test
     */
    public function activateUser_wrongRoles_responseForbidden($request)
    {
        // GIVEN
        $user = $this->createUserAndBe('email@example.com', $request);

        // WHEN
        $response = $this->json('PUT', route('user.activate', ['user_id' => $user->id]));

        // THEN
        $response->assertForbidden();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Activate user
     * @case Failed activate user, not logged
     *
     * @test
     */
    public function activateUser_notLogged_responseUnauthorized()
    {
        // GIVEN
        $user = $this->createUser();

        // WHEN
        $response = $this->json('PUT', route('user.activate', ['user_id' => $user->id]));

        // THEN
        $response->assertUnauthorized();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}
