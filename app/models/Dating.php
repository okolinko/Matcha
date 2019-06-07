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
				echo "true";
			}
			else {
				echo "false";
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

				echo "true2";
			}
			else {

				echo "false2";
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

				echo "true3";
			}
			else {
				echo "false3";
				unset($acaunt[$key]);
			}
		}
		return $acaunt;
	}

	/*
	 * Доделать поиск по радиусу
	 */


	public static function searchLocation($radius, $acaunt, $user_location) {
		$res = explode(" ", $radius);
		$radius = explode("-", $res[0]);
		$radiusMin = intval($radius[0]);
		$radiusMax = intval($radius[1]);
		$lon1 = (float)($user_location[0]);
		$lat1 = (float)($user_location[1]);


		foreach($acaunt as $key => &$acaunt_list) {

		}
		$lon2 = 50.5212;
		$lat2 = 30.4503;
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$res = $miles * 1.609344;


		return $acaunt;
	}
}