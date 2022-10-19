<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\TypicalResponses;

/**
 * @OA\Response(
 *     response="unauthorized_401",
 *     description="Unauthorized response.",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Unauthorized."
 *         ),
 *     ),
 * )
 */
class UnauthorizedResponse401OA
{
}
