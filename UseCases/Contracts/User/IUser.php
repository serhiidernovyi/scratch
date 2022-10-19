<?php

declare(strict_types=1);

namespace UseCases\Contracts\User;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use UseCases\Contracts\Requests\Auth\IRegisterUser;
use UseCases\Contracts\Requests\User\IUpdateUserRequest;
use UseCases\Contracts\Requests\User\IActivateUserRequest;

interface IUser
{
    public function register(IRegisterUser $request);
    public function showUsers(IUsersListRequest $query_param): LengthAwarePaginator;
    public function showUser(int $user_id): \UseCases\Contracts\User\Entities\IUser;
    public function update(IUpdateUserRequest $data_provider, User $user): \UseCases\Contracts\User\Entities\IUser;
    public function delete(User $user);
    public function activate(IActivateUserRequest $user_id_provider);
}
