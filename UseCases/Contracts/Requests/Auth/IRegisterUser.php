<?php

declare(strict_types=1);

namespace UseCases\Contracts\Requests\Auth;

interface IRegisterUser
{
    public function getUserPassword();

    public function getUsername();

    public function getUserSurname();

    public function getEmail();

    public function getRoles();

    public function getPhone();

    public function getPostalCode();

    public function getCity();

    public function getStreet();

    public function getBankAccount();

    public function getSocialSecurity();

    public function getSalaryPerHour();
}
