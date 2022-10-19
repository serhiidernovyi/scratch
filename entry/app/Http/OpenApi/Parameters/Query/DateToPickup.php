<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="to_pickup_date",
 *     name="to_pickup_date",
 *     in="query",
 *     required=false,
 *     description="To date od pickup delivery",
 *     @OA\Schema(
 *         type="string",
 *         example="2021-08-10"
 *     ),
 * )
 */
class DateToPickup
{
}
