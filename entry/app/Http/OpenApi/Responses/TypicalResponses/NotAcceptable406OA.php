<?php

namespace App\Http\OpenApi\Responses\TypicalResponses;

/**
 * @OA\Response(
 *     response="not_acceptable_406",
 *     description="Method not acceptable wrong data.",
 *     @OA\JsonContent(
 *         type="object",
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Method not acceptable."
 *         ),
 *     ),
 * )
 */
class NotAcceptable406OA
{

}
