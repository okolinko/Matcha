<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\User;

class AccountController
{
	protected $db;

	/**
	 * User constructor.
	 * @throws \Exception
	 */
	public function __construct()
	{
		$this->db = App::get('database');
	}
	//выводим страничку юзера
	public function	personalArea()
	{
		if (!$_SESSION['userId'])
		{
			redirect('login');
		}
//		$sql = new self();
//		$response = $sql->db->selectOne('questionary', 'id_user', $_SESSION['userId']);
//		$location = explode(" ", strval($response->location));

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