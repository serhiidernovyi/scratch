<?php

declare(strict_types=1);

namespace UseCases\User;

use App\Models\User;
use UseCases\DomainServiceFactory;
use UseCases\Contracts\User\Entities\IUser;
use UseCases\Contracts\User\IUsersListRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use UseCases\Contracts\User\IUser as IUserService;
use UseCases\Contracts\Requests\User\IUpdateUserRequest;
use UseCases\Contracts\Requests\User\IActivateUserRequest;

class UserCase
{
    private DomainServiceFactory $domain_service_factory;

    /**
     * @param DomainServiceFactory $domain_service_factory
     */
    public function __construct(DomainServiceFactory $domain_service_factory)
    {
        $this->domain_service_factory = $domain_service_factory;
    }

    public function showUsers(IUsersListRequest $request): LengthAwarePaginator
    {
        /** @var IUserService $user_service */
        $user_service = $this->domain_service_factory->create(IUserService::class);

        return $user_service->showUsers($request);
    }

    public function showUser(int $user_id): IUser
    {
        /** @var IUserService $user_service */
        $user_service = $this->domain_service_factory->create(IUserService::class);

        return $user_service->showUser($user_id);
    }

    public function update(IUpdateUserRequest $data_provider, User $user)
    {
        /** @var IUserService $user_service */
        $user_service = $this->domain_service_factory->create(IUserService::class);

        return $user_service->update($data_provider, $user);
    }

    public function delete(User $user)
    {
        /** @var IUserService $user_service */
        $user_service = $this->domain_service_factory->create(IUserService::class);

        return $user_service->delete($user);
    }

    public function activate(IActivateUserRequest $user_id_provider)
    {
        /** @var IUserService $user_service */
        $user_service = $this->domain_service_factory->create(IUserService::class);

        return $user_service->activate($user_id_provider);
    }
}
