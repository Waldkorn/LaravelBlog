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

        $role_non_paying_user = new Role();
        $role_non_paying_user->name = "non_paying_user";
        $role_non_paying_user->description = "A new user who hasn't subscribed yet";
        $role_non_paying_user->save();

        $role_paying_user = new Role();
        $role_paying_user->name = "paying_user";
        $role_paying_user->description = "A user who has subscribed";
        $role_paying_user->save();

        $role_platform_owner = new Role();
        $role_platform_owner->name = "platform_owner";
        $role_platform_owner->description = "The owner of the platform";
        $role_platform_owner->save();

    }
}
