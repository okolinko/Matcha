<?php

namespace App\Controllers;

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
		if(!$_POST['location']) {
			$location = "50.469013 30.462357";
		}
		else {
			$location = strval($_POST['location']);
		}
        if (isset($_POST['submit'])) {
//        	file_put_contents("/Users/akolinko/lol", json_encode($_POST), FILE_APPEND);
			$name = ($_POST['name']);
            $age = ($_POST['age']);
            $im = ($_POST['im']);
            $search = ($_POST['search']);

            if (empty($name) or empty($age)){
				$this->errors[] = 'Все поля должны быть заполнены!';

				return view('accaunt', ['errors' => $this->errors]);
			}
            if(!User::age($age))
			{
				$this->errors[] = 'Ваш возраст недопустим для знакомств на данном сайте';

				return view('accaunt', ['errors' => $this->errors]);
			}
			if (!Auth::checkName($name)) {
				$this->errors[] = 'Неправильное длина или формат имени!      
				 (Имя должно начинаться с большой буквы и иметь длину от 5 до 18 символов)';

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
//			if(!$_POST['location']) {
//				$location = "50.469013 30.462357";
//			}
//			else {
//				$location = strval($_POST['location']);
//			}
			User::writeFormDatabase($_SESSION['userId'], $name, $age, $gender, $orientation, $location);
			redirect('personalArea');
        }
	}
}
