<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="to_date",
 *     name="to_date",
 *     in="query",
 *     required=false,
 *     description="To date for invoice searching",
 *     @OA\Schema(
 *         type="string",
 *         example="2021-08-10",
 *         default="today"
 *     ),
 * )
 */
class DateTo
{
}
