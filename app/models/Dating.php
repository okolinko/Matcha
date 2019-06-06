<?php

namespace App\Models;

use App\Core\App;

class Dating {

	protected $db;

	public function __construct()
	{
		$this->db = App::get('database');
	}

	public static function searchAge($a, $acaunt) {

		$age = explode("-", $a);
		$ageMin = intval($age[0]);
		$ageMax = intval($age[1]);
		foreach ($acaunt as $acaunt_list){
			if(intval($acaunt_list['age']) >= $ageMin and intval($acaunt_list['age']) <= $ageMax){
//$res = $acaunt_list['userId'];
//				file_put_contents("/Users/akolinko/lol", $res, FILE_APPEND);
				return true;
			}
			else{

				return false;
			}
		}

	}

	public static function searchGender($gender, $acaunt) {
		if($gender == "Парня") {
			$gender = "male";
		}
		else {
			$gender = "female";
		}
		foreach ($acaunt as $acaunt_list) {
			if(strval($acaunt_list['gender']) == strval($gender)){

				return true;
			}
			else{

				return false;
			}
		}
	}

	public static function searchOrientation($orientation, $acaunt) {
		if ($orientation == "Гетеро") {
			$orientation = "heterosexual";
		}
		elseif ($orientation == "Би") {
			$orientation = "bisexual";
		}
		else {
			$orientation = "LGBT";
		}
		foreach ($acaunt as $acaunt_list) {
			if(strval($acaunt_list['orientation']) == strval($orientation)){

				return true;
			}
			else{
				return false;
			}
		}
	}
}