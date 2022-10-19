<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Controllers\User;

use App\Http\Controllers\User\RegisterController;

class RegisterControllerOA
{
    /**
     * @OA\Post(
     *     path="/auth/register",
     *     operationId="create-user",
     *     tags={"User"},
     *     security={{"bearerAuth":{}}},
     *     summary="Create User",
     *     description="Create User",
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Register"),
     *     ),
     *
     *     @OA\Response(response="201", ref="#/components/responses/message"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="403", ref="#/components/responses/forbidden_403"),
     *     @OA\Response(response="422", ref="#/components/responses/validation_422"),
     * )
     * @see RegisterController
     */
    public function register()
    {
    }
}
