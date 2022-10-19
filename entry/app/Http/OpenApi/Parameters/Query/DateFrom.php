<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="from_date",
 *     name="from_date",
 *     in="query",
 *     required=false,
 *     description="From date for invoice searching",
 *     @OA\Schema(
 *         type="string",
 *         example="2021-08-10",
 *         default="start of the month"
 *     ),
 * )
 */
class DateFrom
{
}
