<?php

namespace App\Http\OpenApi\Responses\Report;

/**
 * @OA\Response(
 *     response="sele-response",
 *     description="Sale response.",
 *     @OA\JsonContent(
 *         @OA\Property(
 *             property="data",
 *         ref="#/components/schemas/sale_object"),
 *     ),
 * ),
 *   )
 */
class SaleResponseOA
{
}
