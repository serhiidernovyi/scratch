<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\Auth;

use App\Http\Resources\Auth\LoginResource;

class LoginResponseOA
{
    /**
     * @OA\Response(
     *     response="login_response",
     *     description="Successful response",
     *     @OA\JsonContent(
     *         @OA\Property(
     *             property="id",
     *             type="string",
     *             description="User id",
     *         ),
     *         @OA\Property(
     *             property="token",
     *             type="string",
     *             description="Access token",
     *         ),
     *         @OA\Property(
     *             property="name",
     *             type="string",
     *             description="User name",
     *         ),
     *         @OA\Property(
     *             property="surname",
     *             type="string",
     *             description="User surname",
     *         ),
     *     ),
     * )
     * @link LoginResource
     */
    public function login()
    {
    }
}
