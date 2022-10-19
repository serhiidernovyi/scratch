<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\TypicalResponses;

/**
 * @OA\Response(
 *     response="validation_422",
 *     description="Error message response.",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="The given data was invalid."
 *         ),
 *         @OA\Property(
 *             property="errors",
 *             @OA\Property(
 *                 property="validation",
 *                 type="array",
 *                 @OA\Items(
 *                     type="string",
 *                     example="some value not valid",
 *                 ),
 *             ),
 *         ),
 *     ),
 * )
 */
class Validation422OA
{
}
