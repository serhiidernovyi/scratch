<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\TypicalResponses;

/**
 * @OA\Response(
 *     response="bad_request_400",
 *     description="Bad Request response",
 *
 *
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="error",
 *             type="string",
 *             example="Error message: `Bad Request`",
 *         ),
 *         @OA\Property(
 *             property="error_description",
 *             type="string",
 *             example="Description of error"
 *         ),
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="getMessage"
 *         ),
 *     ),
 * )
 */
class BadRequest400OA
{
}
