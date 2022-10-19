<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Responses\User;

class UserResponseOA
{
    /**
     * @OA\Response(
     *     response="user_response",
     *     description="Successful response",
     *     @OA\JsonContent(
     *         @OA\Property(
     *             property="id",
     *             type="string",
     *             description="User id",
     *         ),
     *         @OA\Property(
     *             property="name",
     *             type="string",
     *             description="User name",
     *         ),
     *         @OA\Property(
     *             property="surname",
     *             type="string",
     *             description="User surname",
     *         ),
     *         @OA\Property(
     *             property="email",
     *             type="string",
     *             description="User email",
     *         ),
     *         @OA\Property(
     *             property="phone",
     *             type="string",
     *             description="User phone number",
     *         ),
     *         @OA\Property(
     *             property="post_code",
     *             type="string",
     *             description="User post_code",
     *         ),
     *         @OA\Property(
     *             property="city",
     *             type="string",
     *             description="User city",
     *         ),
     *         @OA\Property(
     *             property="street",
     *             type="string",
     *             description="User street",
     *         ),
     *         @OA\Property(
     *             property="bank_account",
     *             type="string",
     *             description="User bank account number",
     *         ),
     *         @OA\Property(
     *             property="social_security",
     *             type="string",
     *             description="User social security",
     *         ),
     *         @OA\Property(
     *             property="salary_per_hour",
     *             type="string",
     *             description="User salary per hour",
     *         ),
     *         @OA\Property(
     *             property="roles",
     *             type="array",
     *             @OA\Items(
     *             ref="#/components/schemas/roles"),
     *         ),
     *     ),
     * )
     * @link UserResource
     */
    public function show()
    {
    }
}
