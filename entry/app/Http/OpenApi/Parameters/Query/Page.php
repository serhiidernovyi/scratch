<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="page",
 *     name="page",
 *     in="query",
 *     required=false,
 *     description="Requested page.",
 *     @OA\Schema(
 *         type="integer",
 *         default=1,
 *     ),
 * )
 */
class Page
{
}
