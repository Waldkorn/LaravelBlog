<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends ViewShareController
{
    public function index()
    {
    	return view('information');
    }
}
