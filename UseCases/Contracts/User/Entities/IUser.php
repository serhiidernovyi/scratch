<?php

namespace UseCases\Contracts\User\Entities;

use Illuminate\Support\Collection;

interface IUser
{
    public function getId(): int;

    public function getName(): string;

    public function getSurname(): string;

    public function getEmail(): string;

    public function getPhone(): ?string;

    public function getPostCode(): ?string;

    public function getCity(): ?string;

    public function getStreet(): ?string;

    public function getBankAccount(): ?string;

    public function getSocialNumber(): ?string;

    public function getSalaryPerHour(): ?string;

    public function showRoles(): Collection;
}
