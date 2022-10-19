<?php

declare(strict_types=1);

namespace User;

use App\Models\User;
use User\Contracts\IRegister;
use User\Contracts\IShowUser;
use User\Contracts\IShowUsers;
use User\Contracts\IUpdateUser;
use App\Models\ResponseMessages;
use App\Models\Other\BadMessages;
use User\Contracts\IActivateUser;
use UseCases\Contracts\User\IUser;
use Illuminate\Foundation\Application;
use User\Entities\UserResponseFactory;
use UseCases\Contracts\User\IUsersListRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use UseCases\Contracts\Requests\Auth\IRegisterUser;
use UseCases\Contracts\Requests\User\IUpdateUserRequest;
use UseCases\Contracts\Requests\User\IActivateUserRequest;

class UserService implements IUser
{
    /**
     * @var Application
     */
    public Application $app;
    /**
     * @var UserResponseFactory
     */
    private UserResponseFactory $response_factory;

    /**
     * @param Application $app
     * @param UserResponseFactory $response_factory
     */
    public function __construct(Application $app, UserResponseFactory $response_factory)
    {
        $this->app = $app;
        $this->response_factory = $response_factory;
    }

    public function register(IRegisterUser $request)
    {
        /* @var IRegister $register */
        $register = $this->app->make(Register::class);

        $user = $register->registerUser($request);

        if ($user instanceof User) {
            $user->assign($request->getRoles());

            return $user;
        }

        return $this->response_factory->createErrorMessage(BadMessages::REGISTER_USER_ERROR, $request);
    }

    public function showUsers(IUsersListRequest $query_param): LengthAwarePaginator
    {
        /* @var IShowUsers $show_users */
        $show_users = $this->app->make(ShowUsers::class);

        return $show_users->show($query_param);
    }

    public function update(IUpdateUserRequest $data_provider, User $user): \UseCases\Contracts\User\Entities\IUser
    {
        /* @var IUpdateUser $update_users */
        $update_users = $this->app->make(UpdateUser::class);

        return $update_users->update($data_provider, $user);
    }

    /**
     * @param User $user
     * @return \UseCases\Contracts\ResponseObjects\IError|\UseCases\Contracts\ResponseObjects\ISuccess
     */
    public function delete(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            return $this->response_factory->createErrorMessage(BadMessages::REMOVE_USER_ERROR, $e);
        }

        return $this->response_factory->createSuccessMessage(ResponseMessages::SUCCESS_REMOVE_USER);
    }

    public function showUser(int $user_id): \UseCases\Contracts\User\Entities\IUser
    {
        /* @var IShowUser $show_user */
        $show_users = $this->app->make(ShowUser::class);

        return $show_users->show($user_id);
    }

    /**
     * @param IActivateUserRequest $user_id_provider
     * @return \UseCases\Contracts\ResponseObjects\IError|\UseCases\Contracts\ResponseObjects\ISuccess
     */
    public function activate(IActivateUserRequest $user_id_provider)
    {
        /* @var IActivateUser $activate */
        $activate = $this->app->make(ActivateUser::class);

        return $activate->activate($user_id_provider);
    }
}
