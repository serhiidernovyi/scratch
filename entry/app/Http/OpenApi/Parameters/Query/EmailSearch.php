<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="email",
 *     name="email",
 *     in="query",
 *     description="Text for searching",
 *     @OA\Schema(
 *         type="string",
 *     ),
 * )
 */
class EmailSearch
{
}
