<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Session;
use Config;

class LanguageController extends ViewShareController
{
    public function toggle() {	

    	if (Session('locale') == "en") {
    		
    		Session()->put('locale', 'nl');
    		Session::save();

		} else {

			Session()->put('locale', 'en');
			Session::save();
			
		}


		return back();

    }
}
