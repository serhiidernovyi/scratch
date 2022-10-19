<?php

namespace Tests;

use Carbon\Carbon;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use App\Models\Other\RoleType;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;


    public function createUser($email = 'email@example.com', $role = RoleType::MODERATOR)
    {
        $this->user = User::factory()->state([
            'email' => $email,
            'name' => 'John',
            'surname' => 'Doe',
        ])->create();
        $this->user->assign($role);

        return $this->user;
    }

    public function createDeletedUser($email = 'email@example.com')
    {
        return User::factory()->state([
            'email' => $email,
            'name' => 'John',
            'surname' => 'Doe',
            'deleted_at' => Carbon::now()->subDay(),
        ])->create();
    }

    protected function createUserAndBe($email = 'admin@example.com', $role = RoleType::ADMIN)
    {
        $this->createUser($email, $role);
        Sanctum::actingAs($this->user);

        return $this->user;
    }
}
