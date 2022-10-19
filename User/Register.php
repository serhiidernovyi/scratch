<?php

declare(strict_types=1);

namespace User;

use App\Models\User;
use User\Contracts\IRegister;
use Illuminate\Support\Facades\Hash;
use UseCases\Contracts\Requests\Auth\IRegisterUser;

class Register implements IRegister
{
    /**
     * @var User
     */
    public User $user_model;
    /**
     * @var Hash
     */
    public $hash;

    /**
     * @param User $user_model
     * @param Hash $hash
     */
    public function __construct(User $user_model, Hash $hash)
    {
        $this->user_model = $user_model;
        $this->hash = $hash;
    }

    public function registerUser(IRegisterUser $request)
    {
        return $this->user_model->create([
            'name' => $request->getUsername(),
            'surname' =>$request->getUserSurname(),
            'email' => strtolower($request->getEmail()),
            'password' => $this->hash::make($request->getUserPassword()),
            'phone' => $request->getPhone(),
            'postal_code' => $request->getPostalCode(),
            'city' => $request->getCity(),
            'street' => $request->getStreet(),
            'bank_account' => $request->getBankAccount(),
            'social_security' => $request->getSocialSecurity(),
            'salary_per_hour' => $request->getSalaryPerHour(),
        ]);
    }
}
