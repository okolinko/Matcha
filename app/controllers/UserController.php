<?php

namespace App\Controllers;

use App\Models\User;


class UserController{


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
//        if (isset($_POST['submit'])) {
//			$name = strval($_POST['name']);
//            $age = strval($_POST['age']);
//            $im = strval($_POST['im']);
//            $search = strval($_POST['search']);
//            $orientation = $_POST['orientation'];
//            $location = $_POST['location'];

//        }
//		$age = strval($_POST['age']);
//		$name = strval($_POST['name']);
//		$im = strval($_POST['im']);

		$name = "Sania";
		$age = "27";
		$gender = "man";
		$orientation = "heterosexual";
		if(!$_POST['location']) {
			$location = "50.469013 30.462357";
		}
		else {
			$location = strval($_POST['location']);
		}
		User::writeFormDatabase($_SESSION['userId'], $name, $age, $gender, $orientation, $location);
		return view('dating');
	}
}
