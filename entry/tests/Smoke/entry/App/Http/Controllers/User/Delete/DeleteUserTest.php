<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Delete;

use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;
    use DeleteUserTrait;

    /**
     * @feature User
     * @scenario Delete user
     * @case Successfully delete user
     *
     * @test
     */
    public function deleteUser_goodRole_responseOk()
    {
        // GIVEN
        $this->createUserAndBe();
        $user = $this->createUser();

        // WHEN
        $response = $this->json('DELETE', route('user.delete', ['user' => $user->id]));

        // THEN
        $response->assertOk();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Delete user
     * @case Failed delete user, delete self
     *
     * @test
     */
    public function deleteUser_deleteSelf_response400()
    {
        // GIVEN
        $user = $this->createUserAndBe();

        // WHEN
        $response = $this->json('DELETE', route('user.delete', ['user' => $user->id]));

        // THEN
        $this->assertEquals(400, $response->getStatusCode());
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Delete user
     * @case Failed delete user, delete wrong id
     *
     * @test
     */
    public function deleteUser_wrongId_responseNotFound()
    {
        // GIVEN
        $this->createUserAndBe();

        // WHEN
        $response = $this->json('DELETE', route('user.delete', ['user' => -1]));

        // THEN
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Delete user
     * @case Failed delete user, no permission
     *
     * @dataProvider badRoles
     *
     * @param array $request
     *
     * @test
     */
    public function deleteUser_wrongRoles_responseForbidden($request)
    {
        // GIVEN
        $user = $this->createUserAndBe('email@example.com', $request);

        // WHEN
        $response = $this->json('DELETE', route('user.delete', ['user' => $user->id]));

        // THEN
        $response->assertForbidden();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Delete user
     * @case Failed delete user, not logged
     *
     * @test
     */
    public function deleteUser_notLogged_responseUnauthorized()
    {
        // GIVEN
        $user = $this->createUser();

        // WHEN
        $response = $this->json('DELETE', route('user.delete', ['user' => $user->id]));

        // THEN
        $response->assertUnauthorized();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}
