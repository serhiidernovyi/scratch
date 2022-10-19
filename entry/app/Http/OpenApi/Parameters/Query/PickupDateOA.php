<?php

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="pickup_date",
 *     name="pickup_date",
 *     in="query",
 *     required=true,
 *     description="Date of delivery or collection",
 *     @OA\Schema(
 *         type="string",
 *         example="2021-08-10",
 *     ),
 * )
 */
class PickupDateOA
{
}
