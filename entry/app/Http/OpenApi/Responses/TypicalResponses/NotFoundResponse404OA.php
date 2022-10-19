<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\TypicalResponses;

/**
 * @OA\Response(
 *     response="not_found_404",
 *     description="Not found response.",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Not found."
 *         ),
 *     ),
 * )
 */
class NotFoundResponse404OA
{
}
