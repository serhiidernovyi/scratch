<?php

namespace App\Http\OpenApi\Parameters\Path;

/**
 * @OA\Parameter(
 *     parameter="sale_id_path",
 *     name="sale_id",
 *     in="path",
 *     required=true,
 *     description="Sale's id",
 *     @OA\Schema(
 *         type="integer"
 *     ),
 * )
 */
class SaleId
{
}
