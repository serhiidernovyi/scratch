<?php

namespace App\Http\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="json",
 *     type="object",
 *     description="Json object",
 *     @OA\Property(
 *         property="json",
 *         type="object",
 *         @OA\Property(
 *             property="key",
 *             type="string",
 *         ),
 *         @OA\Property(
 *             property="value",
 *             type="string",
 *         ),
 *     ),
 * )
 */
class JsonOA
{

}
