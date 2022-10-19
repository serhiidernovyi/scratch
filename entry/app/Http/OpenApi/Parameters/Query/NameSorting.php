<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="name_sort",
 *     name="name_sort",
 *     in="query",
 *     description="Type sorting by name",
 *     @OA\Schema(
 *         type="string",
 *         enum={"ASC", "DESC"},
 *         default="DESC"
 *     ),
 * )
 */
class NameSorting
{
}
