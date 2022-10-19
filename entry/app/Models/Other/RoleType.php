<?php

declare(strict_types=1);

namespace App\Models\Other;

class RoleType
{
    /**
     * Company admin.
     */
    public const ADMIN = 'ADMIN';

    /**
     * Company moderator.
     */
    public const MODERATOR = 'MODERATOR';

    /**
     * User.
     */
    public const USER = 'USER';



    /**
     * Get all available company role types.
     *
     * @return array
     */
    public static function all()
    {
        return [
            self::ADMIN,
            self::MODERATOR,
            self::USER,
        ];
    }
}
