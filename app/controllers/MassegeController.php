<?php

namespace App\Controllers;

use App\Models\Chat;

class MassegeController {

	public $errors;

	public function __construct()
	{
		$this->errors = [];
	}

	/*
 * Отправлять дату на сервер
 *
 * INSERT INTO `massege`( `chat_id`, `user_id`, `text`, `time`, `date`, `status`) VALUES (1,2,"hi",CURTIME(),CURDATE(),0)
 */
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

}