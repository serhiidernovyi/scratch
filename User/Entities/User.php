<?php

namespace User\Entities;

use App\Models\Other\RoleType;
use App\Traits\DomainMorphMap;
use App\Models\User as ModelUser;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use UseCases\Contracts\User\Entities\IUser;

/**
 * @method static Builder getDrivers()
 * @method static Builder getTrashedUser(int $user_id)
 * @method static Builder getUser(int $user_id)
 */
class User extends ModelUser implements IUser
{
    use DomainMorphMap;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getPostCode(): ?string
    {
        return $this->postal_code;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function getBankAccount(): ?string
    {
        return $this->bank_account;
    }

    public function getSocialNumber(): ?string
    {
        return $this->social_security;
    }

    public function getSalaryPerHour(): ?string
    {
        return $this->salary_per_hour;
    }

    public function showRoles(): Collection
    {
        return $this->getRoles();
    }

    public function scopeGetDrivers(Builder $query)
    {
        $query->whereHas('roles', function ($query) {
            $query->where('name', RoleType::USER);
        })->get();

        return $query;
    }

    public function scopeGetTrashedUser(Builder $query, int $user_id)
    {
        $query->where('id', '=', $user_id)->withTrashed();

        return $query;
    }

    public function scopeGetUser(Builder $query, int $user_id)
    {
        return $query->where('id', $user_id)->first();
    }
}
