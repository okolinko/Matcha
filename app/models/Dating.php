<?php

namespace App\Models;

use App\Core\App;

class Dating
{

	protected $db;

	public function __construct()
	{
		$this->db = App::get('database');
	}

	public static function searchAge($a, $acaunt) {

		$age = explode("-", $a);
		$ageMin = ($age[0]);
		$ageMax = ($age[1]);

		foreach ($acaunt as $key => &$res) {
			if (($res['age']) >= $ageMin and  $res['age'] <= $ageMax) {
				;
			}
			else {
				unset($acaunt[$key]);
			}
		}
		return $acaunt;
	}

	public static function searchGender($gender, $acaunt) {
		if($gender == "Парня") {
			$gender = "male";
		} else {
			$gender = "female";
		}
		foreach($acaunt as $key => &$res) {
			if(strval($res['gender']) == strval($gender)) {
				;
			}
			else {
				unset($acaunt[$key]);
			}
		}
		return $acaunt;
	}

	public static function searchGlory($acaunt, $glory){


		if ($glory == "★"){
			$glory = 1;
		}
		elseif (strval($glory) == "★ ★"){
			$glory = 2;
		}
		elseif (strval($glory) == "★ ★ ★"){
			$glory = 3;
		}
		foreach($acaunt as $key => &$acaunt_list) {
			if((User::getGlory($acaunt_list['userId']) == $glory)) {
				;
			}
			else {
				unset($acaunt[$key]);
			}
		}
		return $acaunt;
	}

	public static function searchOrientation($orientation, $acaunt) {
		if($orientation == "Гетеро") {
			$orientation = "heterosexual";
		} elseif($orientation == "Би") {
			$orientation = "bisexual";
		} else {
			$orientation = "LGBT";
		}
		foreach($acaunt as $key => &$acaunt_list) {
			if(strval($acaunt_list['orientation']) == strval($orientation)) {
				;
			}
			else {
				unset($acaunt[$key]);
			}
		}
		return $acaunt;
	}


	public static function searchIm($acaunt, $id){

		foreach($acaunt as $key => &$acaunt_list) {
			if(strval($acaunt_list['userId']) != strval($id)) {
				;
			}
			else {
				unset($acaunt[$key]);
			}
		}
		return $acaunt;
	}


	/*
	 * Доделать поиск по интересам
	 */

	public static function searchInterests($acaunt, $interests) {
		$m = false;
		$i = 1;
		$sizeArray = count($acaunt);

		foreach($interests as $slovo) {

			if (strpos($acaunt[$i]['info'], $slovo) !== false) {
				$m = true;
				dd(1);
			}
			else{
				dd(2);
				unset($acaunt[$i]);
			}
			while($i < $sizeArray){
				$i++;
			}
		}
		if ($m) { //если истина то выполняю условие
			echo 'в тексте есть совпадения';
		}
		else{
			echo "нету совпадений";
		}
		return $acaunt;
	}

//	public static function searchInterests($acaunt, $interests) {
//		$i = 0;
//		$j = 0;
//		$sizeArray = count($acaunt);
//		$interes = array_values($interests);
//		$acaunt = array_values($acaunt);
//
//		while ($i < $sizeArray)
//		{
//			$res = self::serchainteresting($acaunt[$i]['info'], $interes);
//
//			if (($res == true)) {
//				$j++;
//				dd(2);
//			}
//			else {
//				dd(1);
//				unset($acaunt[$i]);
//			}
//			$i++;
//		}
//		return $acaunt;
//	}
//
//	private static function serchainteresting($arr1, $arr2) {
//		$text = explode("#", $arr1);
//		$new_array = array_diff($text, array(''));
//		$text = array_values($new_array);
//
//		$res = array_intersect($arr2, $text);
//
//return true;
//
////		if (empty($res)){
////			return "false";
////		}
////		else{
////			return "true";
////		}
//	}
//

	public static function searchLocation($radius, $acaunt, $user_location) {
		if ($radius == "Без разницы") {
			return $acaunt;
		}

		$res = explode(" ", $radius);
		$radius = explode("-", $res[0]);
		$radiusMin = (float)($radius[0]);
		$radiusMax = (float)($radius[1]);
		$lon1 = (float)($user_location[0]);
		$lat1 = (float)($user_location[1]);
		$lat1 *= M_PI / 180;
		$lon1 *= M_PI / 180;

		foreach($acaunt as $key => &$acaunt_list) {
			$loc = explode(" ", $acaunt_list['location']);
			$lon2 = (float)($loc[0]);
			$lat2 = (float)($loc[1]);

			$lat2 *= M_PI / 180;
			$lon2 *= M_PI / 180;

			$d_lon = $lon1 - $lon2;
			$slat1 = sin($lat1);
			$slat2 = sin($lat2);
			$clat1 = cos($lat1);
			$clat2 = cos($lat2);
			$sdelt = sin($d_lon);
			$cdelt = cos($d_lon);

			$y = pow($clat2 * $sdelt, 2) + pow($clat1 * $slat2 - $slat1 * $clat2 * $cdelt, 2);

			$x = $slat1 * $slat2 + $clat1 * $clat2 * $cdelt;

			$metr = atan2(sqrt($y), $x) * 6372795;
			$km = round(($metr / 1000), 4);
		}
			if ($km >= $radiusMin and  $km <= $radiusMax) {
				;
			}
			else {
				unset($acaunt[$key]);
			}

		return $acaunt;
	}

	public static function searchLiked($userId, $userLikeId) {
		$result = array();

		foreach($userLikeId as $key => &$list) {
			$id = User::LikedUserInfo($list);
			if (Dating::helpSearch($id, $userId) == 1)
			{
				array_push($result, $userLikeId[$key]);
			}
		}

		return $result;
	}

	private function helpSearch($id, $userId){
		foreach($id as $key => &$user) {
				if(strval($user) == strval($userId)) {
					return 1;
				}
			}

		return 0;
	}

	public static function viewLikedUser($id) {

		$sql = new self();
		$acaunt = $sql->db->selectAll('questionary');
		if (!$acaunt) {
			return null;
		}
		$i = 0;
		$j = 0;
		$sizeArray = count($acaunt);
		while ($i < $sizeArray)
		{
			if ($acaunt[$i]->id_user == $id[$j]) {
				$j++;
			}
			else {
				unset($acaunt[$i]);
			}
			$i++;
		}
		return $acaunt;


	}
}