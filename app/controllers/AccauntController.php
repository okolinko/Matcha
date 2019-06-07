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
		$lon1 = 50.4705;
		$lat1 = 30.4642;
		$lon2 = 50.5212;
		$lat2 = 30.4503;
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$res = $miles * 1.609344;
		echo $res;
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