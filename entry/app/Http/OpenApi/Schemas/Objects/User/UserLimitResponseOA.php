<?php

namespace App\Http\OpenApi\Schemas\Objects\User;

/**
 * @OA\Schema(
 *     schema="user_limit_response",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         description="User id",
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="User name",
 *     ),
 *     @OA\Property(
 *         property="surname",
 *         type="string",
 *         description="User surname",
 *     ),
 *     @OA\Property(
 *         property="roles",
 *         type="array",
 *         @OA\Items(
 *         ref="#/components/schemas/roles"),
 *     ),
 * )
 */
class UserLimitResponseOA
{

}
