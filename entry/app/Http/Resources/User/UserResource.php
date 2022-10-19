<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use UseCases\Contracts\User\Entities\IUser;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        /** @var IUser $this */
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'postal_code'=> $this->getPostCode(),
            'city'=> $this->getCity(),
            'street' => $this->getStreet(),
            'bank_account'=> $this->getBankAccount(),
            'social_security' => $this->getSocialNumber(),
            'salary_per_hour' => $this->getSalaryPerHour(),
            'roles' => $this->showRoles(),
        ];
    }
}
