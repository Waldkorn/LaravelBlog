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

        //$users = User::get();
      //  $role_non_paying_user = Role::where('name', 'non_paying_user')->first();

        $platform_owner = User::first();

        $role_platform_owner = Role::where('name', 'platform_owner')->first();
        $role_paying_user = Role::where('name', 'paying_user')->first();

        $platform_owner->roles()->attach($role_platform_owner);
        $platform_owner->roles()->attach($role_paying_user);

      /*  foreach ($users as $user) {
        	$user->roles()->attach($role_non_paying_user);
        }
      */
    }
}
