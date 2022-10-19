<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\TypicalResponses;

/**
 * @OA\Response(
 *     response="message",
 *     description="Message response.",
 *     @OA\JsonContent(
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Message content.",
 *         ),
 *     ),
 * )
 */
class MessageResponseOA
{
}
