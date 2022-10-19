<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Filter;
use App\Models\Other\RoleType;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilterPolicy
{
    use HandlesAuthorization;

    public function useFilter(User $user): bool
    {
        return $user->isAn(RoleType::ADMIN, RoleType::MODERATOR, RoleType::STORAGE_WORKER);
    }


    /**
     * Determine if the user can see the item filter.
     *
     * @param User $user
     * @param Filter $filter
     *
     * @return bool
     */
    public function show(User $user, Filter $filter)
    {
        return $filter->user_id == $user->id &&
            $user->itemFilters()->where('id', $filter->id)->exists();
    }
}
