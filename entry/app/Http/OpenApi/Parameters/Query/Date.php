<?php

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="created_at",
 *     name="created_at",
 *     in="query",
 *     required=false,
 *     description="Date for order searching",
 *     @OA\Schema(
 *         type="string",
 *         example="2021-08-10",
 *     ),
 * )
 */
class Date
{
}
