<?php

namespace App\Controllers;

use App\Models\Dating;
use App\Models\User;

class MainController
{
	/**
	 * Show the home page.
	 */
	public function index()
	{
//	    $id  = 6;
//	    Dating::userBanAdd($id);
//	    Dating::userBanDellete($id);
		return view('index');
	}


	public function page404(){

		return view('page404');
	}

}