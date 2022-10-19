<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="user_id_query",
 *     name="user_id",
 *     in="query",
 *     required=true,
 *     description="Numeric ID user for resend",
 *     @OA\Schema(
 *         type="integer",
 *     ),
 * )
 */
class UserIdOA
{
}
