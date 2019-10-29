<?php

namespace App\Controllers;

use App\Models\Dating;
use App\Models\User;
use App\Models\Auth;


class UserController{

	public $errors;

	public function __construct()
	{
		$this->errors = [];
	}
	/*
	 * Logout user from app
	 * @return view index
	 */
	public function logout()
	{
		User::logout();

		return view("/");
	}

	public function deleteAccaunt(){
		if (!$_SESSION['userId'])
		{
			return redirect('personalArea');
		}
		$userName = $_SESSION['userName'];

		$user = User::userNameExists($userName);

		if ($user->admin != 1) {
			if (User::userDelete($user))

			redirect('');
		}
		else{
			echo "<script>alert(\"Админа удалить нельзя!\");</script>";
		}
		return view('personalArea');
	}

	public function actionInde()
	{
		// Получаем идентификатор пользователя из сессии
		$id = User::checkLogged();
		// Получаем информацию о пользователе из БД
		$user = User::getUserById($id);
	}

	public function userProfile() {
		if (!$_SESSION['userId'])
		{
			return redirect('login');
		}
        if (isset($_POST['submit'])) {
//        	file_put_contents("/Users/akolinko/lol", json_encode($_POST), FILE_APPEND);
			$name = ($_POST['name']);
            $age = ($_POST['age']);
            $im = ($_POST['im']);
            $search = ($_POST['search']);
            $city = ($_POST['city']);
            $info = ($_POST['info']);

            if (empty($name) or empty($age) or empty($city)){
				$this->errors[] = 'Все поля должны быть заполнены!';

				return view('accaunt', ['errors' => $this->errors]);
			}
            if(!User::age($age))
			{
				$this->errors[] = 'Ваш возраст недопустим для знакомств на данном сайте';

				return view('accaunt', ['errors' => $this->errors]);
			}
			if (!Auth::checkName(strval($name))) {
				$this->errors[] = 'Имя должно начинаться с большой буквы и иметь длину от 5 до 18 символов';

				return view('accaunt', ['errors' => $this->errors]);
			}

			if (!User::infoUser(strval($info))) {
				$this->errors[] = 'Информация про себя не должна превышать 120 символов';

				return view('accaunt', ['errors' => $this->errors]);
			}

            if($im == "Парень") {
				$gender = "male";
			}
            else {
            	$gender = "female";
			}

			if ($im == "Парень" && $search == "Девушку") {
				$orientation = "heterosexual";
			}
			elseif ($im == "Девушка" && $search == "Парня") {
				$orientation = "heterosexual";
			}
			elseif ($search === "Без разницы") {
				$orientation = "bisexual";
			}
			else {
				$orientation = "LGBT";
			}
				$location = "50.4690 30.4623";


			User::writeFormDatabase($_SESSION['userId'], $name, $age, $gender, $orientation, $location, $city, $info);
			redirect('personalArea');
        }
	}

	public function usergeolocation() {
		$location = explode(" ", strval($_POST['location']));
//		$res = file_get_contents("https://ip-api.io/json");
		file_put_contents("/Users/akolinko/lol", $location, FILE_APPEND);
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
			$inputJSON = file_get_contents('php://input');
			$res = json_decode($inputJSON, TRUE);
		}
//		file_put_contents("/Users/akolinko/lol", $res, FILE_APPEND);
		$res = file_get_contents("https://ip-api.io/json");
		$res = json_decode($res);

//		file_put_contents("/Users/akolinko/lol", $res, FILE_APPEND);
		$location[0] = substr($location[0], 0, 7)." ";
		$location[1] = substr($location[1], 0, 7);

		User::addGeolocation($_SESSION['userId'], $location);
//		file_put_contents("/Users/akolinko/lol", $location[1], FILE_APPEND);
	}

	public  function likedUser() {
		if (!$_SESSION['userId'])
		{
			redirect('login');
		}
		$userId = $_SESSION['userId'];
		$arrayUserLikeId = User::LikedUserInfo($userId);


		$id = Dating::searchLiked($userId, $arrayUserLikeId);
		sort($id);
		reset($id);
		$array = Dating::viewLikedUser($id);

		$acaunt = json_decode(json_encode($array), True);

		require_once('app/views/likedUser.view.php');
	}

	public  function iliked() {
		if (!$_SESSION['userId'])
		{
			redirect('login');
		}
		$userId = $_SESSION['userId'];
		$arrayILikedId = User::Iliked($userId);

		sort($arrayILikedId);
		reset($arrayILikedId);
		$array = Dating::viewLikedUser($arrayILikedId);
		$acaunt = json_decode(json_encode($array), True);

		require_once('app/views/iLiked.view.php');
	}

	public function  visitors() {
		$arrayId = Dating::searchVisit($_SESSION['userId']);
		sort($arrayId);
		reset($arrayId);
		$array = Dating::viewLikedUser($arrayId);
		$acaunt = json_decode(json_encode($array), True);

		require_once('app/views/visitors.view.php');
	}

}
