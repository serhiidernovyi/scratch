<?php

namespace User;

use User\Entities\User;
use User\Contracts\IUpdateUser;
use App\Models\User as DomainUser;
use UseCases\Contracts\User\Entities\IUser;
use UseCases\Contracts\Requests\User\IUpdateUserRequest;

class UpdateUser implements IUpdateUser
{
    public User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function update(IUpdateUserRequest $data_provider, DomainUser $user): IUser
    {
        $domain_user = $this->user->getUser($user->id)->first();

        $domain_user->update([
            'name' => $data_provider->getUsername(),
            'surname' => $data_provider->getUserSurname(),
            'phone' => $data_provider->getPhone(),
            'postal_code' => $data_provider->getPostalCode(),
            'city' => $data_provider->getCity(),
            'street' => $data_provider->getStreet(),
            'bank_account' => $data_provider->getBankAccount(),
            'social_security' => $data_provider->getSocialSecurity(),
            'salary_per_hour' => $data_provider->getSalaryPerHour(),
        ]);

        $this->changeRole($domain_user, $data_provider);
        $user->save();

        return $domain_user;
    }


    protected function changeRole(User $user, IUpdateUserRequest $data_provider): void
    {
        $user->roles()->detach();
        $user->assign($data_provider->getRoles());
    }
}
