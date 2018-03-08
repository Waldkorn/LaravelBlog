<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    
	public function getTopUsers() 
	{

		return $this->topUsers();

	}

	private function topUsers()
    {

    $topUsers = User::with('followers')->get()->sortBy(function(User $user)
    {

        return $user->followers->count();

    })->reverse();

    return $topUsers;

    }

}
