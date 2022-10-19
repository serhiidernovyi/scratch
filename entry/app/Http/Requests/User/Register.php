<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Rules\Register\EmailRule;
use App\Rules\Register\EmailWasUsed;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use UseCases\Contracts\Requests\Auth\IRegisterUser;

/**
 * @link RegisterRequestOA
 */
class Register extends FormRequest implements IRegisterUser
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/(.+)@(.+)\\.(.+)/i',
                new EmailRule(),
                new EmailWasUsed(),
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers(),
            ],
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => 'required|in:ADMIN,MODERATOR,USER',
            'phone' => 'nullable|min:8', // +47 815 XX XXX
            'postal_code' => 'nullable|max:5',
            'city' => 'nullable|min:2|max:50',
            'street' => 'nullable|min:2|max:50',
            'bank_account' => 'nullable|min:2|max:50',
            'social_security' => 'nullable|min:2|max:50',
            'salary_per_hour' => 'nullable|numeric',
        ];
    }

    public function getUsername()
    {
        return $this->input('name');
    }

    public function getEmail()
    {
        return $this->input('email');
    }

    public function getUserPassword()
    {
        return $this->input('password');
    }

    public function getUserSurname()
    {
        return $this->input('surname');
    }

    public function getRoles()
    {
        return $this->input('roles');
    }

    public function getPhone()
    {
        return $this->input('phone');
    }

    public function getPostalCode()
    {
        return $this->input('postal_code');
    }

    public function getCity()
    {
        return $this->input('city');
    }

    public function getStreet()
    {
        return $this->input('street');
    }

    public function getBankAccount()
    {
        return $this->input('bank_account');
    }

    public function getSocialSecurity()
    {
        return $this->input('social_security');
    }

    public function getSalaryPerHour()
    {
        return $this->input('salary_per_hour');
    }
}
