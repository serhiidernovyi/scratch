<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class ForgotEvent
{
    use SerializesModels;

    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;
    public $password;

    /**
     * @param User|\Illuminate\Contracts\Auth\Authenticatable $user
     * @param string $password
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }
}
