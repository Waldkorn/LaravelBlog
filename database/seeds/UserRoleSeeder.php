<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::get();
        $role_non_paying_user = Role::where('name', 'non_paying_user')->first();

        foreach ($users as $user) {
        	$user->roles()->attach($role_non_paying_user);
        }
        
    }
}
