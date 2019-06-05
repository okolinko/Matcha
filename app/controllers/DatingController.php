<?php

namespace App\Controllers;

use App\Models\User;

class DatingController
{

	public function dating()
	{

//		return view("dating");
		$acaunt = array();
		$acaunt = User::loadUserForm();

//		dd($acaunt);
		require_once('app/views/dating.view.php');
	}


}