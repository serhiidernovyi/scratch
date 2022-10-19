<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Requests\Auth;

/**
 * @OA\Schema(
 *     schema="login_request",
 *
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="User Email",
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="User Password",
 *     ),
 * )
 *  * @see LoginRequest
 */
class LoginRequestOA
{
}
