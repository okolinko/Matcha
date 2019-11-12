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
		return view('index');
	}


	public function page404(){

		return view('page404');
	}

}