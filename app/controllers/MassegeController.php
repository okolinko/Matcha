<?php

namespace App\Controllers;

use App\Models\Chat;

class MassegeController {

	public $errors;

	public function __construct()
	{
		$this->errors = [];
	}

	public static function sendMassage() {

			$text =  json_decode($_POST['massage']);
			$text = htmlentities($text);
			$id = json_decode($_POST['id']);
			$id = intval(htmlentities($id));

			if (intval($_SESSION['userId']) < intval($id)) {
				$chatID = $_SESSION['userId'] . $id;
			}
			else {
				$chatID = $id . $_SESSION['userId'];
			}

			if (!Chat::insertMassegeDatabase($chatID, $id, $text, $_SESSION['userId'])) {
				echo "False";
			}
			else {
				echo "True";
			}

	}

	public static function reloadMassage() {
		$id = json_decode($_POST['id']);
		$id = intval(htmlentities($id));

		if (intval($_SESSION['userId']) < $id) {
			$chatID = $_SESSION['userId'] . $id;
		}
		else {
			$chatID = $id . $_SESSION['userId'];
		}

//		file_put_contents("/Users/akolinko/lol", $id, FILE_APPEND);

		$massegeList = array();
		$massegeList = Chat::arrayMassege($chatID);
		$massegeList = array_reverse($massegeList);
		$mass = array();
		foreach($massegeList as $massege) {
			array_push($mass, $massege);
		}

		print json_encode($mass);
	}

}