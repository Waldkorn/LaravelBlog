<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class ProfileController extends Controller
{
    
    public function followUser(int $profileId)
	{
	  	$user = User::find($profileId);

	  	if(! $user) {
	    
	     	return redirect()->back()->with('error', 'User does not exist.'); 
		}
	
		$user->followers()->attach(auth()->user()->id);

		return redirect()->back()->with('success', 'Successfully followed the user.');
	}

	public function unFollowUser(int $profileId)
	{
	  	$user = User::find($profileId);
	  	if(! $user) {
	    
	     	return redirect()->back()->with('error', 'User does not exist.'); 
	 	}

	$user->followers()->detach(auth()->user()->id);


	return redirect()->back()->with('success', 'Successfully unfollowed the user.');

	}
}
