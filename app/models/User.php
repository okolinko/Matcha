<?php

namespace App\Models;

use App\Core\App;

class User {

	protected $db;

	/**
	 * User constructor.
	 * @throws \Exception
	 */
	public function __construct()
	{
		$this->db = App::get('database');
	}

	public  function register($name, $email, $password){

		$admin = 0;
		$act_email = 0;
		$notification = 0;
		$hash_email = hash('whirlpool', $name);
		$password = hash('whirlpool', $password);

		$user = new self();
		$user->db->insert('users', [
			'user_name' => $name,
			'password' => $password,
			'admin' => $admin,
			'act_email' => $act_email,
			'email' => $email,
			'hash_email' => $hash_email,
			'notification' => $notification,
		]);

		mail($email, "Активация email на сайте Matcha", 'Для активации вашей учетной записи '.$name.' 
				перейдите по этой ссылке '.BASE_URL.'/register/verification?hash='.$hash_email);


	}

	public static function addFoto($name, $userId, $img) {

		$sql = new self();
		$sql->db->insert('photo', [
			'name' => $name,
			'user_id' => $userId,
			'img' => $img,
		]);

	}

	/*
	 * Get user by credentials
	 * @param string $email
	 * @param string $password
	 * @return User | null
	 */
	public static function getUserByEmail(string $email)
	{
		$user = new self();

		$response = $user->db->selectOne('users', 'email', $email);

		if (!$response) {
			return null;
		}

		foreach ($response as $key => $value) {
			$user->$key = $value;
		}

		return $user;
	}

	/*
	 *  Сheck name in the table
	 *  @param string $name
	 *  @return User | null
	 */
	public static function userNameExists(string $name)
	{

		$user = new self();

		$response = $user->db->selectOne('users', 'user_name', $name);

		if (!$response) {
			return null;
		}

		foreach ($response as $key => $value) {
			$user->$key = $value;
		}

		return $user;
	}

	public static function userFoto(string $id)
	{
			 $user = new self();
			$response = $user->db->selectAll('photo');
			if (!$response) {
				return null;
			}
		$userFoto = array();
		$i = 0;
		while($response[$i])
			{
				if (intval($id) == intval($response[$i]->user_id)){
					$userFoto[$i]['id'] = $response[$i]->id;
					$userFoto[$i]['user_id'] = $response[$i]->user_id;
					$userFoto[$i]['img'] = $response[$i]->img;
				}
				$i++;
			}

			return($userFoto);
	}

	public static function avtorFoto($fotoId) {
		$user = new self();
		$response = $user->db->selectOne('comment', 'user_id', $fotoId);
		$userId = $response->user_id;
		$avtor = $user->db->selectOne('users', 'id', $userId);

		return $avtor->user_name;
	}

	public static function auth($userId)
	{
		session_start();
		$_SESSION['userId'] = $userId;
	}


	public static function logout()
	{
		unset($_SESSION['userId']);
		unset($_SESSION['userName']);
	}

	public static function editPassword(string $id, string $name, string $password)
	{
		$sql = new self();
		$sql->db->updatePassword($id, $name, $password);

	}


	public static function checkLogged()
	{
		if (isset($_SESSION['userId'])) {
			return $_SESSION['userId'];
		}
		else
			redirect('/');
	}


	public static function isGuest(){

		if (isset($_SESSION['userId'])){
			return (false);
		}
		return (true);
	}


	public static function userDelete($user) : bool
	{
		$id = $user->id;
		$sql = new self();

		Auth::logout();
		$sql->db->delete('users', $id);

		return true;
	}



	public static function userDeleteFoto($foto)
	{
		$id = intval($foto);
		$sql = new self();

		$response = $sql->db->selectOne('photo', 'id', $id);
		$img = $response->img;
		unlink('public/img/'.$_SESSION['userId'].'/'."$img");
		$sql->db->delete('photo', $id);

		return true;
	}

		public static function idFotoUser($foto){
		$foto_id = intval($foto);
		$sql = new self();

		$response = $sql->db->selectOne('foto', 'id', $foto);
		if (!$response) {
		   return null;
		 }

		return($response->user_id);
	}
/*
 * Отправка уведомления
 */

	public static function alertEmailMassege($userName, $foto, $idFotoUser) {

		if (User::notificationStatus() == 1) {
		$fotoId = intval($foto);
		$fotoId = intval($idFotoUser);

		$sql = new self();
		$response = $sql->db->selectOne('users', 'id', $idFotoUser);
		$email = $response->email;
		mail($email, "Новое действие", ' На сайте "Matcha" вашей фото был оставлен коментарий от пользователя '.$userName.". ".'  Перейдите по ссылке чтобы посмотреть'.BASE_URL);
		}
	}

/*
 * Изменения статуса отправки
 * уведомления с сайта
 * Возвращаем true | false
 */
	public static function offNotifications(string $userId) : bool {
		$userId = intval($userId);
		$table = "users";
		$data = "notification";

		$status = User::notificationStatus($userId);

		$sql = new self();

		$response = $sql->db->update($table, $userId, [
			'notification' => $status,
			]);
		if (!$response) {
			return false;
		}

		return true;
	}

	public static function editEmail(string $userId, string $email2)
	{
		$userId = intval($userId);
		$table = "users";
		$data = "email";

		$sql = new self();

		$response = $sql->db->update($table, $userId, [
			'email' => $email2,
		]);
		if (!$response) {
			return false;
		}

		return true;
	}


	public static function notificationStatus(string $userId) {

		$userId = intval($userId);
		$sql = new self();
		$response = $sql->db->selectOne('users', 'id', $userId);

		$notification = $response->notification;

		if ($notification == 0) {
			return 1;
		}

		return 0;
	}

	public static function writeFormDatabase(string $userId, string $name, string $age,

											 string $gender, string $orientation, string $location, string  $city, string $info) : bool {


		$sql = new self();
		$userId = intval($userId);
		$table = "questionary";
		$response = $sql->db->selectOne('questionary', 'id_user', $userId);
		if (!$response) {
					$sql->db->insert('questionary', [
			'id_user' => $userId,
			'name' => $name,
			'gender' => $gender,
			'orientation' => $orientation,
			'age' => $age,
			'location' => $location,
			'city' => $city,
			'info' => $info,
		]);
		}
		else {
			$sql->db->update2($table, $userId, [
				'id_user' => $userId,
				'name' => $name,
				'gender' => $gender,
				'orientation' => $orientation,
				'location' => $response->location,
				'age' => $age,
				'city' => $city,
				'info' => $info,
			]);
		}
		return true;
	}

	public static function age(string $age) : bool {

		$age = intval($age);
		if ($age < 18 || $age > 80) {
			return false;
		}
		return true;
	}

	public static function parseLocation($userId) {
		$sql = new self();

		$response = $sql->db->selectOne('questionary', 'id_user', $_SESSION['userId']);
		$location = explode(" ", strval($response->location));
		return $location;
	}
	public static function addGeolocation($userId, $loc) {

		$sql = new self();
		$userId = intval($userId);
		$table = "questionary";
		$location = $loc[0].$loc[1];
		$location = strval($location);
		$response = $sql->db->selectOne('questionary', 'id_user', $userId);
		if (!$response) {
			return false;
		}
		else {
			$sql->db->update2($table, $userId, [
				'id_user' => $userId,
				'name' => $response->name,
				'gender' => $response->gender,
				'orientation' => $response->orientation,
				'location' => $location,
				'age' => $response->age,
				'city' => $response->city,
				'info' => $response->info,
			]);
		}
	}
	public static function loadUserForm() {
		$sql = new self();

		$response = $sql->db->selectAll('questionary');
		if (!$response) {

			return null;
		}
		$userAcaunt = array();
		$i = 0;
		while($response[$i]) {
			$userAcaunt[$i]['userId'] = $response[$i]->id_user;
			$userAcaunt[$i]['name'] = $response[$i]->name;
			$userAcaunt[$i]['gender'] = $response[$i]->gender;
			$userAcaunt[$i]['orientation'] = $response[$i]->orientation;
			$userAcaunt[$i]['location'] = $response[$i]->location;
			$userAcaunt[$i]['age'] = $response[$i]->age;
			$userAcaunt[$i]['city'] = $response[$i]->city;
			$userAcaunt[$i]['info'] = $response[$i]->info;
			$userAcaunt[$i]['ban'] = User::statusBan($response[$i]->id_user);
			$i++;
		}
		return $userAcaunt;
	}

	public static function loadUserInfo($userId, $table, $id) {
		$sql = new self();

		$response = $sql->db->selectOne($table, $id, $userId);
		if (!$response) {
			return 0;
		}
		return $response;
	}

	public static function loadUser($userId)
	{
		$sql = new self();

		$response = $sql->db->selectOne('users', 'id', $userId);

		if(!$response) {
			return false;
		}
		return $response;
	}
	public static function infoUser($info) {

		$len = iconv_strlen($info);

		if($len > 120) {
			return false;
		}
		return true;
	}

	public static function addLikeUser($userLikeId, $userId) {
		$sql = new self();
		$userId = intval($userId);
		$table = "like_users";
		$response = $sql->db->selectOne($table, 'user_id', $userId);
		if (!$response) {
			$sql->db->insert('like_users', [
				'user_id' => $userId,
				'likeUsers' => $userLikeId,
			]);
		}
		else {
			$res = explode(",", $response->likeUsers);
			foreach ($res as $key => &$r) {
				var_dump($userLikeId);
				if(intval($r) == $userLikeId) {
					return ;
				}
				else{
					$newUser = $response->likeUsers.",".$userLikeId;
					$sql->db->update3($table, $userId, [
					'user_id' => $userId,
					'likeUsers' => $newUser,
					]);
				}
			}
		}
	}


	public static function dellLikeUser($userLikeId, $userId) {
		$sql = new self();

		$userId = intval($userId);
		$table = "like_users";
		$response = $sql->db->selectOne($table, 'user_id', $userId);
		$res = explode(",", $response->likeUsers);
		foreach ($res as $key => &$r) {
			if(intval($r) == $userLikeId) {
				unset($res[$key]);
			}
		}
		$strId = implode(",", $res);
		$sql->db->update3($table, $userId, [
			'user_id' => $userId,
			'likeUsers' => $strId,
		]);

	}

	public static function statusLike($userLikeId, $userId) {
		$sql = new self();

		$userId = intval($userId);
		$table = "like_users";
		$response = $sql->db->selectOne($table, 'user_id', $userId);
		$res = explode(",", $response->likeUsers);
		foreach ($res as $key => &$r) {
			if(intval($r) == $userLikeId) {
				return 1;
			}
		}
		return 0;
	}

	public static function LikedUserInfo($userId) {

		$sql = new self();

		$userId = intval($userId);
		$table = "like_users";
		$response = $sql->db->selectOne($table, 'user_id', $userId);
		if (!$response) {
			return 0;
		}
		else {
			$res = explode(",", $response->likeUsers);
			return $res;
		}
	}

	public static function getGlory($userId) {

		$sql = new self();
		$response = $sql->db->selectAll('like_users');

		$response = json_decode(json_encode($response),TRUE);

		$i = 0;
		$j = 0;
		$sizeArray = count($response);
		while ($i < $sizeArray)
		{
			if (strpbrk($response[$i]['likeUsers'], strval($userId))) {
				$j++;
			}
			$i++;
		}
		if ($j >= 0 && $j <= 10){
			return 1;
		}
		elseif($j > 10 && $j <= 25){
			return 2;
		}
		elseif($j > 25){
			return 3;
		}
	}




	public static function iliked($userId) {
		$sql = new self();
		$response = $sql->db->selectAll('like_users');
		$acaunt = json_decode(json_encode($response),TRUE);

		$i = 0;
		$j = 0;
		$sizeArray = count($acaunt);

		while ($i < $sizeArray)
		{
			if ($acaunt[$i]['id'] == $userId){
				unset($acaunt[$i]);
				$acaunt = array_values($acaunt);
			}

			$res = self::serchliked($acaunt[$i]['likeUsers'], $userId);

			if (($res == true)) {
				$j++;
			}
			else {
				unset($acaunt[$i]);
			}
			$i++;
		}
		$size = count($acaunt);
		$i = 0;
		$res = array();
		while ($i < $size){
			array_push($res, $acaunt[$i]['user_id']);

			$i++;
		}
		return $res;
	}

	private static function serchliked($arr1, $userId)
	{
		$array = explode(",", $arr1);
		$sizeArray1 = count($array);
		$i = 0;
		while($i < $sizeArray1) {
			if($array[$i] == $userId){
				return true;
			}
			$i++;
		}
		return false;
	}

	public function statusBan($whoWasBanned){

        $sql = new self();
        $table = "userban";
        $whoBanned = $_SESSION['userId'];
        $response = $sql->db->selectAllParam($table, "*", "who_banned = ".$whoBanned." and who_was_banned = ".$whoWasBanned);
	    if(empty($response))
            return 0;
	    return 1;
    }

}

