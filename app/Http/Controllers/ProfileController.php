<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Post;
use App\Role;
use App\BankDetails;

class ProfileController extends ViewShareController
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

	public function setUpgrade(string $profileName, Request $request)
	{

		$this->validate(request(), [

			'name' => 'required',
			'iban' => 'required',
      'bic' => 'required'

		]);

		$user = User::where('name', $profileName)->first();

		$role_non_paying_user = Role::where('name', 'non_paying_user')->first();
		$role_paying_user = Role::where('name', 'paying_user')->first();

    $bankdetails = new BankDetails();
    $bankdetails->user_id = $user->id;
    $bankdetails->IBAN = $request->input('iban');
    $bankdetails->BIC = $request->input('bic');
    $bankdetails->mandaat_id = rand(0, 5000);
    $bankdetails->name = $request->input('name');
    $bankdetails->save();

		$user->roles()->attach($role_paying_user->id);
		$user->roles()->detach($role_non_paying_user->id);

		return redirect('/posts/create');
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
