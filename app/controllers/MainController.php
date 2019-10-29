<?php

namespace App\Controllers;

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