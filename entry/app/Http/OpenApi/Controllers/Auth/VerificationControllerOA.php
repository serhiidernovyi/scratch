<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Controllers\Auth;

/**
 * @see VerificationController
 */
class VerificationControllerOA
{
    /**
     * @OA\Get(
     *     path="/auth/email/verify/{id}",
     *     operationId="verify-email",
     *     tags={"Auth"},
     *     summary="Verify User Email",
     *     description="Verify User Email",
     *
     *     @OA\Parameter(ref="#/components/parameters/user_id_path"),
     *
     *     @OA\Response(response="302", ref="#/components/responses/http_found"),
     *     @OA\Response(response="301", ref="#/components/responses/http_moved_permanently"),
     * )
     */
    public function verify()
    {
    }
}
