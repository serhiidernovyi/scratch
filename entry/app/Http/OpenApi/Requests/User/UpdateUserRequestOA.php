<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Requests\User;

/**
 * @OA\Schema(
 *     schema="update_user",
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="First name of user",
 *     ),
 *     @OA\Property(
 *         property="surname",
 *         type="string",
 *         description="Last name of user",
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="Phone number of user",
 *     ),
 *     @OA\Property(
 *         property="post_code",
 *         type="string",
 *         description="City's postal code of user",
 *     ),
 *     @OA\Property(
 *         property="city",
 *         type="string",
 *         description="City of user",
 *     ),
 *     @OA\Property(
 *         property="street",
 *         type="string",
 *         description="Street of user",
 *     ),
 *     @OA\Property(
 *         property="bank_account",
 *         type="string",
 *         description="Bank accaunt number of user",
 *     ),
 *     @OA\Property(
 *         property="social_security",
 *         type="string",
 *         description="Social security number of user",
 *     ),
 *     @OA\Property(
 *         property="salary_per_hour",
 *         type="string",
 *         description="Salary per hour of user",
 *     ),
 *     @OA\Property(
 *         property="roles",
 *         type="array",
 *         @OA\Items(
 *         ref="#/components/schemas/roles"),
 *     ),
 * )
 * @see UpdateUserRequest
 */
class UpdateUserRequestOA
{
}
