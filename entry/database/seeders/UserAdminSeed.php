<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->state([
            'email' => 'serhii.d@devpark.pl',
        ])->create();

        $user->assign('ADMIN');
    }
}
