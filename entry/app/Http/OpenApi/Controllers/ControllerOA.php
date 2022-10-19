<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Controllers;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="My App",
 *     description="My App",
 *     @OA\Contact(
 *         name="S.Dernovyi",
 *         email="s.dernovyi@gmail.com",
 *     )
 * )
 *
 * @OA\Server(
 *     url="no.server",
 *     description="develop"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     in="header",
 *     name="bearerToken",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="Sanctum",
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Auth part of application.",
 * )
 *
 * @OA\Tag(
 *     name="User",
 *     description="User part of application.",
 * )
 *
 *
 *
 * @see Controller
 */
class ControllerOA
{
}
