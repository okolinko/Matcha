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
		$acaunt = Dating::searchIm($acaunt, $_SESSION['userId']);
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
			$glory = $_POST['glory'];
			$interests = $_POST['interesting'];

//			file_put_contents("/Users/akolinko/lol", $interests, FILE_APPEND);
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

			$dating_glory = Dating::searchGlory($dating_location, $glory);
			if (empty($dating_glory)) {
				$this->errors[] = "Пользователей з данной славой не найдено";

				return view('dating', ['errors' => $this->errors]);
			}

			$acauntIm = Dating::searchIm($dating_glory, $_SESSION['userId']);
			if (empty($acaunt)) {
				$this->errors[] = "Пользователей в данной категории не найдено";

				return view('dating', ['errors' => $this->errors]);
			}
			if (empty($interests)) {
				$acaunt = $acauntIm;
			}
			else {
				if (strlen($interests) > 120) {
					$this->errors[] = "Количество символов в поле с интересами может быть максимум 120";
					return view('dating', ['errors' => $this->errors]);
				}
				$array = explode("#", $interests);
				$new_array = array_diff($array, array(''));
				$count = count($new_array);
				if ($count > 6) {
					$this->errors[] = "Может быть до 6 выбранных интересов максимум";
					return view('dating', ['errors' => $this->errors]);
				}
				$acaunt = Dating::searchInterests($acauntIm, $new_array);
//				$acaunt = Dating::searchInterests($acauntIm, $interests);
				if (empty($acaunt)){
					$this->errors[] = "Пользователей с данными интересами не найдено";
					return view('dating', ['errors' => $this->errors]);
				}
			}

		}
		require_once('app/views/dating.view.php');
	}

}