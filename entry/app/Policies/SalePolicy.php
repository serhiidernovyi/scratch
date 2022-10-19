<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Other\RoleType;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sales
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function show(User $user)
    {
        return $user->isAn(RoleType::ADMIN, RoleType::MODERATOR);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sale  $sales
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function showSale(User $user)
    {
        return $user->isAn(RoleType::ADMIN, RoleType::MODERATOR, RoleType::STORAGE_WORKER);
    }
}
