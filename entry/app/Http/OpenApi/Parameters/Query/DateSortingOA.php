<?php

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="created_at_sort",
 *     name="created_at_sort",
 *     in="query",
 *     description="Type sorting by date",
 *     @OA\Schema(
 *         type="string",
 *         enum={"ASC", "DESC"},
 *         default="DESC"
 *     ),
 * )
 */
class DateSortingOA
{
}
