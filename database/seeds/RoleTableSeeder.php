<?php
use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->Role_type = 'Engineer';
        $role_user->description = 'A normal User';
        $role_user->save();
        $role_author = new Role();
        $role_author->Role_type = 'Supervisor';
        $role_author->description = 'An Author';
        $role_author->save();
        $role_admin = new Role();
        $role_admin->Role_type = 'Administrator';
        $role_admin->description = 'A Admin';
        $role_admin->save();
    }
}
