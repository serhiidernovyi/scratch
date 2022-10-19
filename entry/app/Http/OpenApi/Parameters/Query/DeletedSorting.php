<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="deleted_search",
 *     name="deleted_search",
 *     in="query",
 *     description="Sort only deleted",
 *     @OA\Schema(
 *         type="bool",
 *         enum={"true"}
 *     ),
 * )
 */
class DeletedSorting
{
}
