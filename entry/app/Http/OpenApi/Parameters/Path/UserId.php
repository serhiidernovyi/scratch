<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Path;

/**
 * @OA\Parameter(
 *     parameter="user_id_path",
 *     name="user_id",
 *     in="path",
 *     required=true,
 *     description="User`s id",
 *     @OA\Schema(
 *         type="integer"
 *     ),
 * )
 */
class UserId
{
}
