<?php

declare(strict_types=1);

namespace User;

use User\Entities\User;
use User\Filters\UserFilter;
use User\Contracts\IShowUsers;
use Illuminate\Foundation\Application;
use UseCases\Contracts\User\IUsersListRequest;

class ShowUsers implements IShowUsers
{
    /**
     * @var Application
     */
    public Application $app;
    /**
     * @var User
     */
    public User $user;

    /**
     * @param Application $app
     * @param User $user
     */
    public function __construct(Application $app, User $user)
    {
        $this->app = $app;
        $this->user = $user;
    }


    public function show(IUsersListRequest $query_param)
    {
        $data = $query_param->validated();
        $filter = $this->app->make(UserFilter::class, ['queryParams' => array_filter($data)]);

        $query = $this->user->filter($filter);

        return $query->with('roles')->paginate($query_param->getPerPage());
    }
}
