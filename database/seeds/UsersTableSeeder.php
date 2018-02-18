<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_engr = Role::where('Role_type', 'Engineer')->first();
        $role_supervisor = Role::where('Role_type', 'Supervisor')->first();
        $role_admin = Role::where('Role_type', 'Administrator')->first();
        $user = new User();
        $user->first_name = 'Victor';
        $user->last_name = 'Visitor';
        $user->email = 'visitor@example.com';
        $user->password = bcrypt('visitor');
        $user->designation = "Engineer";
        $user->save();
        $user->roles()->attach($role_engr);
        $admin = new User();
        $admin->first_name = 'Alex';
        $admin->last_name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
        $author = new User();
        $author->first_name = 'Andy';
        $author->last_name = 'Author';
        $author->email = 'author@example.com';
        $author->password = bcrypt('author');
        $author->save();
        $author->roles()->attach($role_supervisor);
    }
}
