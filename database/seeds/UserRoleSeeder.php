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

        $platform_owner = User::first();

        $role_platform_owner = Role::where('name', 'platform_owner')->first();
        $role_paying_user = Role::where('name', 'paying_user')->first();

        $platform_owner->roles()->attach($role_platform_owner);
        $platform_owner->roles()->attach($role_paying_user);
        
    }
}
