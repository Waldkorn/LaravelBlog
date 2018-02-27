<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Role;

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

	public function upgrade(string $profileName)
	{
		$user = User::where('name', $profileName)->first();
		
		return view('profile.upgrade', compact('user'));
	}

	public function setUpgrade(string $profileName)
	{

		$this->validate(request(), [

			'name' => 'required',
			'payment_details' => 'required'

		]);

		$user = User::where('name', $profileName)->first();

		$role_non_paying_user = Role::where('name', 'non_paying_user')->first();
		$role_paying_user = Role::where('name', 'paying_user')->first();

		$user->roles()->attach($role_paying_user->id);
		$user->roles()->detach($role_non_paying_user->id);


		dd($user);

	}

	public function read() {

		if (Auth::check()) {

			$user = Auth::user();

			return view('profile.page', compact('user'));

		} else {

			return redirect('/login');

		}

	}

}
