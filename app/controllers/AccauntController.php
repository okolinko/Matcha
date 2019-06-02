<?php

namespace App\Controllers;

use App\Models\User;

class AccountController
{
	//выводим страничку юзера
	public function	personalArea()
	{
		if (!$_SESSION['userId'])
		{
			redirect('login');
		}

		return view('accaunt');
	}

	public function dellUserImage() {
		$foto	= $_POST['foto'];
		User::userDeleteFoto($foto);
	}


	public function actionDelimg()
	{
		$foto	= $_POST['foto'];
		$res = User::delImg($foto);
		if ($res === true)
			echo "true";
		return true;
	}


	/*
	 * отключение уведомлений на почту
	 */
	public function notifications() {

		if (!$_SESSION['userId'])
		{
			redirect('login');
		}
		$userId = User::checkLogged();

		User::offNotifications($userId);

		redirect('personalArea');
	}
}