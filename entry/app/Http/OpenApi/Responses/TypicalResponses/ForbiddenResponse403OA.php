<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\TypicalResponses;

/**
 * @OA\Response(
 *     response="forbidden_403",
 *     description="Forbidden response.",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Forbidden."
 *         ),
 *     ),
 * )
 */
class ForbiddenResponse403OA
{
}
