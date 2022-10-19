<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Requests\Auth;

/**
 * @OA\Schema(
 *     schema="forgotten_request",
 *
 *     required={
 *         "email",
 *     },
 *
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="User`s email",
 *         example="user@user.com",
 *     ),
 * )
 * @see ResetPassword
 */
class ForgottenPasswordRequestOA
{
}
