<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Query;

/**
 * @OA\Parameter(
 *     parameter="buyer_search",
 *     name="buyer_search",
 *     in="query",
 *     description="Search by byuer name",
 *     @OA\Schema(
 *         type="string",
 *     ),
 * )
 */
class BuyerSearchReport
{
}
