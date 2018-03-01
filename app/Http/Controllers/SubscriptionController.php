<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Mail\Subscription;


class SubscriptionController extends ViewShareController
{	

	


	protected $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}


	public function index()
    {	
    	Auth::user();
    	return view('subscription.index')->with('user', $this->user);
    }

     public function store(Request $request)
    {
    // Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey("sk_test_oH125kRo13Q7DD0Zj7StrA1I");

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$token = $_POST['stripeToken'];

	// Charge the user's card:
	$charge = \Stripe\Charge::create(array(
	  "amount" => 999,
	  "currency" => "eur",
	  "description" => "subscription charge",
	  "statement_descriptor" => "Secure Beyond",
	  "capture" => false,
	  "source" => $token,
	));
	
	$charge_id = $charge['id'];
	$ch = \Stripe\Charge::retrieve($charge_id); //ch_1A9eP02eZvKYlo2CkibleoVM
	$ch->capture();

    $this->validate($request, [
        'stripeToken' => 'required',
    ]);

    // $request->user()->newSubscription('main', 'plan-id-in-stripe')
    //                 ->create($request->input('stripe_token'));


    $role_paying_user = Role::where("name", "paying_user")->first();
    $role_non_paying_user = Role::where('name', 'non_paying_user')->first();

    $request->user()->roles()->attach($role_paying_user);
    $request->user()->roles()->detach($role_non_paying_user);


    return redirect('/profile')->withSuccess('You are now subscribed.');
}
	public function paymentNotification()
	{
		$paying_users = Role::where("name", "paying_user")->get();
		//dd($paying_users[0]['id']);
		//$test = User::where('id', $paying_users[0]['id'])->first();
		//dd($test->email);
		//$users ->where($paying_user[id])
		foreach ($paying_users as $paying_user) {
			$test = User::where('id', $paying_user['id'])->first();

			\Mail::to($test)->send(new Subscription($test));
		}
	}

}
