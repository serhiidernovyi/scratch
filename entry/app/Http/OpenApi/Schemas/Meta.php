<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="meta",
 *     type="object",
 *     description="Meta",
 *     @OA\Property(
 *         property="meta",
 *         type="object",
 *         @OA\Property(
 *             property="current_page",
 *             type="integer",
 *             example=1,
 *         ),
 *         @OA\Property(
 *             property="from",
 *             type="integer",
 *             example=1,
 *         ),
 *         @OA\Property(
 *             property="last_page",
 *             type="integer",
 *             example=1,
 *         ),
 *         @OA\Property(
 *             property="path",
 *             type="string",
 *             example="bla_bla",
 *         ),
 *         @OA\Property(
 *             property="per_page",
 *             type="integer",
 *             example=10,
 *         ),
 *         @OA\Property(
 *             property="to",
 *             type="integer",
 *             example=5,
 *         ),
 *         @OA\Property(
 *             property="total",
 *             type="integer",
 *             example=5,
 *         ),
 *     ),
 * )
 */
class Meta
{
}
