<?php

namespace Database\Seeders;

use Bouncer;
use Illuminate\Database\Seeder;
use Silber\Bouncer\Database\Role;
use Silber\Bouncer\Database\Ability;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        $bouncer = Bouncer::create();

        $bouncer->role()->create([
            'name' => 'ADMIN',
            'title' => 'admin',
        ]);

        $bouncer->allow('ADMIN')->toManage(Role::class);
        $bouncer->allow('ADMIN')->toManage(Ability::class);
//        Bouncer::forbid('ADMIN')->toManage(User::class);

        $bouncer->role()->create([
            'name' => 'MODERATOR',
            'title' => 'moderator',
        ]);

        $bouncer->role()->create([
            'name' => 'USER',
            'title' => 'user',
        ]);
    }
}
