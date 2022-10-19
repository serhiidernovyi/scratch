<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\User;

/**
 * @OA\Response(
 *     response="user_list_response",
 *     description="Users List response.",
 *     @OA\JsonContent(
 *         allOf={
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="data",
 *                     type="array",
 *                     @OA\Items(ref="#/components/schemas/user_item"),
 *                 ),
 *             ),
 *             @OA\Schema(ref="#/components/schemas/links"),
 *             @OA\Schema(ref="#/components/schemas/meta"),
 *         }
 *     ),
 * )
 */
class UserListResponseOA
{
}
