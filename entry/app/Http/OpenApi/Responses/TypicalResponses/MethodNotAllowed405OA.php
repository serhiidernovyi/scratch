<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\TypicalResponses;

/**
 * @OA\Response(
 *     response="not_allowed_405",
 *     description="Method not alowed.",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Method not alowed."
 *         ),
 *     ),
 * )
 */
class MethodNotAllowed405OA
{
}
