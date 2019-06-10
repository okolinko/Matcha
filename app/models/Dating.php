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

	/*
	 * Доделать поиск по радиусу
	 */


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
}