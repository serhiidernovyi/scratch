<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="links",
 *     type="object",
 *     description="Links",
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(
 *             property="first",
 *             type="string",
 *             example="https://some_path/some-list?page=1",
 *         ),
 *         @OA\Property(
 *             property="last",
 *             type="string",
 *             example="https://some_path/some-list?page=5",
 *         ),
 *         @OA\Property(
 *             property="prev",
 *             type="string",
 *             nullable=true,
 *             example=null,
 *         ),
 *         @OA\Property(
 *             property="next",
 *             type="string",
 *             nullable=true,
 *             example=null,
 *         ),
 *     ),
 * )
 */
class Links
{
}
