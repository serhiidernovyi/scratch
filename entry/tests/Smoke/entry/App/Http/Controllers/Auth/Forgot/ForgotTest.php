<?php

namespace Tests\Smoke\entry\App\Http\Controllers\Auth\Forgot;

use function route;
use Tests\TestCase;
use App\Mail\Forgot;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotTest extends TestCase
{
    use ForgotTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Success reset password, user email exist
     *
     * @test
     */
    public function resetPassword_success_request201()
    {
        // GIVEN
        $this->createUser('email@example.com');
        Mail::fake();
        $credentials = $this->createCredentials('email@example.com');

        // WHEN
        $response = $this->json('post', route('forgot'), $credentials);

        // THEN
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Success reset password, user email exist
     *
     * @test
     */
    public function resetPassword_success_mailQueued()
    {
        // GIVEN
        $this->createUser('email@example.com');
        Mail::fake();
        $credentials = $this->createCredentials('email@example.com');

        // WHEN
        $response = $this->json('post', route('forgot'), $credentials);

        // THEN
        Mail::assertQueued(Forgot::class, function ($mail) {
            return $mail->hasTo('email@example.com');
        });
    }

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Success reset password, user email exist, upper case
     *
     * @test
     */
    public function resetPassword_upperCase_response201()
    {
        // GIVEN
        $this->createUser('email@example.com');
        Mail::fake();
        $credentials = $this->createCredentials('EMAIL@example.com');

        // WHEN
        $response = $this->json('post', route('forgot'), $credentials);

        // THEN
        Mail::assertQueued(Forgot::class, function ($mail) {
            return $mail->hasTo('email@example.com');
        });
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Failed reset password, user email not exist
     *
     * @test
     */
    public function resetPassword_credentialsNotWalid_response422()
    {
        // GIVEN
        $this->createUser('email@example.com');
        Mail::fake();
        $credentials = $this->createCredentials('wrong@example.com');

        // WHEN
        $response = $this->json('post', route('forgot'), $credentials);

        // THEN
        Mail::assertNothingQueued();
        $this->assertEquals(422, $response->getStatusCode());
        $this->assertEquals(
            $response->baseResponse->original['errors']['email'][0],
            'The selected email is invalid.'
        );
    }

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Failed reset password, user email is empty
     *
     * @test
     */
    public function resetPassword_credentialsEmpty_response422()
    {
        // GIVEN
        $this->createUser('email@example.com');
        Mail::fake();
        $credentials = $this->createCredentials('');

        // WHEN
        $response = $this->json('post', route('forgot'), $credentials);

        // THEN
        Mail::assertNothingQueued();
        $this->assertEquals(422, $response->getStatusCode());
        $this->assertEquals(
            $response->baseResponse->original['errors']['email'][0],
            'The email field is required.'
        );
    }

    /**
     * @feature Auth
     * @scenario Reset Password
     * @case Failed reset password, email not email
     *
     * @test
     */
    public function resetPassword_notEmailGiven_response422()
    {
        // GIVEN
        $this->createUser('email@example.com');
        Mail::fake();
        $credentials = $this->createCredentials('hello');

        // WHEN
        $response = $this->json('post', route('forgot'), $credentials);

        // THEN
        Mail::assertNothingQueued();
        $this->assertEquals(422, $response->getStatusCode());
        $this->assertEquals(
            $response->baseResponse->original['errors']['email'][0],
            'The email must be a valid email address.'
        );
    }
}
