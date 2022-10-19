<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Parameters\Path;

/**
 * @OA\Parameter(
 *     parameter="comment_id_path",
 *     name="comment_id",
 *     in="path",
 *     required=true,
 *     description="Comment`s id",
 *     @OA\Schema(
 *         type="integer"
 *     ),
 * )
 */
class CommentId
{
}
