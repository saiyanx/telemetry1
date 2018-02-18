<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        First role seeder then call user seeder as user
        seeder needs field from roles
        */
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
