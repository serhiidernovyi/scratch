<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Header;

/**
 * @OA\Parameter(
 *     parameter="token_header",
 *     name="token",
 *     in="header",
 *     required=true,
 *     description="Logged token",
 *     @OA\Schema(
 *         type="string"
 *     ),
 * )
 */
class Token
{
}
