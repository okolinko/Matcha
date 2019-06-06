<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Dating;

class DatingController
{

	public $errors;

	public function __construct()
	{
		$this->errors = [];
	}

	public function dating()
	{

//		return view("dating");
		$acaunt = array();
		$acaunt = User::loadUserForm();

//		dd($acaunt);
		require_once('app/views/dating.view.php');
	}

	public function searchUser() {
		if (!$_SESSION['userId'])
		{
			return redirect('login');
		}
		$acaunt = array();
		$acaunt = User::loadUserForm();
		if (isset($_POST['submit'])) {
//        	file_put_contents("/Users/akolinko/lol", json_encode($_POST), FILE_APPEND);
			$search = ($_POST['search']);
			$age = $_POST['age'];
			$orientation = $_POST['orientation'];
			$radius = $_POST['radius'];
			if (empty($acaunt)) {
				$this->errors[] = 'Нету зарегистрированых пользователей';

				return view('dating', ['errors' => $this->errors]);
			}
			if (!Dating::searchAge($age, $acaunt)) {
//				file_put_contents("/Users/akolinko/lol", "1111", FILE_APPEND);
				$this->errors[] = 'Пользователей в данной возрастной категории не найдено';
				return view('dating', ['errors' => $this->errors]);
			}
			if (!Dating::searchGender($search, $acaunt)) {
				$this->errors[] = 'Пользователей c такими данными не найдено';

				return view('dating', ['errors' => $this->errors]);
			}

			if (!Dating::searchOrientation($orientation, $acaunt)) {
				$this->errors[] = 'Пользователей c данной ориентацией не найдено';

				return view('dating', ['errors' => $this->errors]);
			}
			return view("dating");
		}
//		return view("dating");
	}

}