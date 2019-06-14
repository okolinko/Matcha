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

	public function userAccaunt() {
		if (!$_SESSION['userId'])
		{
			redirect('login');
		}
		$userId	= intval($_GET['id']);

		$questionary = User::loadUserInfo($userId, "questionary", "id_user");
		$userInfo = User::loadUser($userId);
		$userFoto = User::userFoto($userId);
		$location = explode(" ", strval($questionary->location));
		$location[0] = substr($location[0], 0, 7)." ";
		$location[1] = substr($location[1], 0, 7);

		$status = User::statusLike($userId, $_SESSION['userId']);
		require_once('app/views/accauntUser.view.php');
	}


	public function acauntLikeAdd(){
		$userLikeId    = $_POST['id'];

		$userId = $_SESSION['userId'];

		if ($userId == false)
		{
			echo "false";
		}
		else{
			User::addLikeUser($userLikeId, $userId);

			echo "true";
		}
	}

	public function acauntLikeDel(){
		$userLikeId    = $_POST['id'];
//		$userLikeId    = 8;
		$userId = $_SESSION['userId'];

		if ($userId == false)
		{
			echo "false";
		}
		else{
			User::dellLikeUser($userLikeId, $userId);

			echo "true";
		}
	}
}