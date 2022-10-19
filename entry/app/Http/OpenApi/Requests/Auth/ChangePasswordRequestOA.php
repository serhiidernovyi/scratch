<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Requests\Auth;

/**
 * @OA\Schema(
 *     schema="change_request",
 *
 *     required={
 *         "old_password",
 *         "password",
 *         "password_confirmation",
 *     },
 *
 *     @OA\Property(
 *         property="old_password",
 *         type="string",
 *         description="User`s old password",
 *         example="old_password",
 *     ),
 *     @OA\Property(
 *         property="password",
 *         type="string",
 *         description="Password",
 *     ),
 *     @OA\Property(
 *         property="password_confirmation",
 *         type="string",
 *         description="Password Confirmation",
 *     ),
 * )
 * @see ChangePassword
 */
class ChangePasswordRequestOA
{
}
