<?php

namespace Tests\Smoke\entry\App\Http\Controllers\User\Register;

use function route;
use Tests\TestCase;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RegisterTrait;
    use RefreshDatabase;

    /**
     * @feature User
     * @scenario Register
     * @case Successfully register
     *
     * @test
     */
    public function register_success_responseCreated()
    {
        // GIVEN
        Mail::fake();
        $credentials = $this->createCredentials();
        $this->createUserAndBe();

        // WHEN
        $response = $this->json('post', route('register'), $credentials);

        // THEN
        Mail::assertQueued(VerifyEmail::class, function ($mail) {
            return $mail->hasTo('email@example.com');
        });
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @feature User
     * @scenario Register
     * @case Successfully register, minimum credentials
     *
     * @test
     */
    public function register_minCredentials_responseCreated()
    {
        // GIVEN
        Mail::fake();
        $credentials = $this->createMinCredentials();
        $this->createUserAndBe();

        // WHEN
        $response = $this->json('post', route('register'), $credentials);

        // THEN
        Mail::assertQueued(VerifyEmail::class, function ($mail) {
            return $mail->hasTo('email@example.com');
        });
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @feature User
     * @scenario Register
     * @case Successfully register, double roles credentials
     *
     * @test
     */
    public function register_rolesCredentials_responseCreated()
    {
        // GIVEN
        Mail::fake();
        $credentials = $this->createRolesCredentials();
        $this->createUserAndBe();

        // WHEN
        $response = $this->json('post', route('register'), $credentials);

        // THEN
        Mail::assertQueued(VerifyEmail::class, function ($mail) {
            return $mail->hasTo('email@example.com');
        });
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @feature User
     * @scenario Register
     * @case Successfully register
     *
     * @test
     */
    public function register_lowerCase_responseCreated()
    {
        // GIVEN
        $this->createUserAndBe();
        Mail::fake();
        $credentials = $this->createCredentials('Email@Example.com');

        // WHEN
        $response = $this->json('post', route('register'), $credentials);
        $user = User::all()->first();

        // THEN
        Mail::assertQueued(VerifyEmail::class, function ($mail) {
            return $mail->hasTo('email@example.com');
        });
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @feature User
     * @scenario Register
     * @case Failed register, user not admin
     *
     * @test
     */
    public function register_userNotAdmin_responseForbidden()
    {
        // GIVEN
        $this->createUserAndBe('admin@example.com', 'MODERATOR');
        Mail::fake();
        $credentials = $this->createCredentials('Email@Example.com');

        // WHEN
        $response = $this->json('post', route('register'), $credentials);

        // THEN
        Mail::assertNothingQueued();
        $response->assertForbidden();
        $this->assertEquals(
            $response->baseResponse->original['message'],
            'Has no access to content.'
        );
    }

    /**
     * @feature User
     * @scenario Register
     * @case Failed register, user email exist
     *
     * @test
     */
    public function register_userExist_responseUnprocessable()
    {
        // GIVEN
        $this->createUserAndBe('email@example.com');
        Mail::fake();
        $credentials = $this->createCredentials('Email@Example.com', 'Password1');

        // WHEN
        $response = $this->json('post', route('register'), $credentials);

        // THEN
        Mail::assertNothingQueued();
        $response->assertUnprocessable();
        $this->assertEquals(
            $response->baseResponse->original['errors']['email'][0],
            'The email has already been taken.'
        );
    }

    /**
     * @feature User
     * @scenario Register
     * @case Failed register
     *
     * @dataProvider badRequests
     *
     * @param array $request
     *
     * @test
     */
    public function register_badRequest_responseUnprocessable(array $credentials)
    {
        // GIVEN
        $this->createUserAndBe();
        Mail::fake();

        // WHEN
        $response = $this->json('post', route('register'), $credentials);

        // THEN
        Mail::assertNothingQueued();
        $this->assertEquals(422, $response->getStatusCode());
    }
}
