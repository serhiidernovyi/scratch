<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * password 'Password1'
     * @return void
     */
    public function run()
    {
        $this->call(Roles::class);
        $this->call(UserAdminSeed::class);
    }
}
