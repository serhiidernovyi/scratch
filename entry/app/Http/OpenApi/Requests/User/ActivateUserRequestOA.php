<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Requests\User;

/**
 * @OA\Schema(
 *     schema="activate_user",
 *     @OA\Property(
 *         property="user_id",
 *         type="int",
 *         description="Id of deleted user. ",
 *     ),
 * )
 * @see ActivateUserRequest
 */
class ActivateUserRequestOA
{
}
