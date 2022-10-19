<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Controllers\Auth;

use App\Http\Controllers\Auth\AuthController;

class AuthControllerOA
{
    /**
     * @OA\Get(
     *     path="/auth/logout",
     *     operationId="logout-user",
     *     tags={"Auth"},
     *     security={{"bearerAuth":{}}},
     *     summary="Logout user",
     *     description="Logout user by API",
     *
     *     @OA\Response(response="200", ref="#/components/responses/message"),
     *     @OA\Response(response="401", ref="#/components/responses/forbidden_403"),
     * )
     * @see AuthController::logout()
     */
    public function logout()
    {
    }

    /**
     * @OA\Post(
     *     path="/auth/login",
     *     operationId="login-user",
     *     tags={"Auth"},
     *     summary="Login user",
     *     description="Login user by API",
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/login_request")
     *     ),
     *
     *     @OA\Response(response="200", ref="#/components/responses/login_response"),
     *     @OA\Response(response="400", ref="#/components/responses/bad_request_400"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="403", ref="#/components/responses/forbidden_403"),
     * )
     * @see AuthController::login()
     */
    public function login()
    {
    }

    /**
     * @OA\Post(
     *     path="/auth/forgot",
     *     operationId="forgot-password",
     *     tags={"Auth"},
     *     summary="Reset password by email",
     *     description="Will Send random generation password",
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/forgotten_request"),
     *     ),
     *
     *     @OA\Response(response="201", ref="#/components/responses/message"),
     *     @OA\Response(response="422", ref="#/components/responses/validation_422"),
     * )
     * @see AuthController::forgot()
     * @see ForgottenPasswordRequestOA
     */
    public function forgot()
    {
    }

    /**
     * @OA\Post(
     *     path="/auth/change",
     *     operationId="change-password",
     *     tags={"Auth"},
     *     security={{"bearerAuth":{}}},
     *     summary="Chang password by email",
     *     description="Set new password",
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/change_request"),
     *     ),
     *
     *     @OA\Response(response="201", ref="#/components/responses/message"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="422", ref="#/components/responses/validation_422"),
     * )
     * @see AuthController::changePassword()
     */
    public function changePassword()
    {
    }
}
