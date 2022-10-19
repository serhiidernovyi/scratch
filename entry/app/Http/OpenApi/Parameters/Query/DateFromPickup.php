<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="from_pickup_date",
 *     name="from_pickup_date",
 *     in="query",
 *     required=false,
 *     description="From date od delivery pickup",
 *     @OA\Schema(
 *         type="string",
 *         example="2021-08-10"
 *     ),
 * )
 */
class DateFromPickup
{
}
