<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="per_page",
 *     name="per_page",
 *     in="query",
 *     required=false,
 *     description="Items per page.",
 *     @OA\Schema(
 *         type="integer",
 *         default=10,
 *     ),
 * )
 */
class PerPage
{
}
