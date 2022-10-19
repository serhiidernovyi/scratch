<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="surname_sort",
 *     name="surname_sort",
 *     in="query",
 *     description="Type sorting by surname",
 *     @OA\Schema(
 *         type="string",
 *         enum={"ASC", "DESC"},
 *         default="DESC"
 *     ),
 * )
 */
class SurnameSorting
{
}
