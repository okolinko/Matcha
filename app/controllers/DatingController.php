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

		$acaunt = array();
		$acaunt = User::loadUserForm();

		require_once('app/views/dating.view.php');
	}

	public function searchUser() {
		if (!$_SESSION['userId'])
		{
			return redirect('login');
		}
		$acaunt = array();
		$acaunt = User::loadUserForm();

		$user_location = User::parseLocation($_SESSION['userId']);

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
			$dating_age =  Dating::searchAge($age, $acaunt);
			if (empty($dating_age)) {
				$this->errors[] = 'Пользователей в данной возрастной категории не найдено';

				return view('dating', ['errors' => $this->errors]);
			}

			$dating_gender = Dating::searchGender($search, $dating_age);
			if (empty($dating_gender)) {
				$this->errors[] = 'Пользователей c такими данными не найдено';

				return view('dating', ['errors' => $this->errors]);
			}

			$dating_orientation = Dating::searchOrientation($orientation, $dating_gender);
			if (empty($dating_orientation)) {
				$this->errors[] = 'Пользователей c данной ориентацией не найдено';

				return view('dating', ['errors' => $this->errors]);
			}

			$dating_location = Dating::searchLocation($radius, $dating_orientation, $user_location);
			if (empty($dating_location)) {
				$this->errors[] = "Пользователей по близости не найдено, попробуйте увеличить радиус поиска";

				return view('dating', ['errors' => $this->errors]);
			}

			echo '<pre>';
			print_r($dating_location);
			echo '</pre>';
//			return view("dating");
			$acaunt = $dating_orientation;
		}
//		return view("dating");


		require_once('app/views/dating.view.php');
	}

}