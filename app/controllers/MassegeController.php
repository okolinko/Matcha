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
			$massage = "Вам пришло новое сообщение от пользователя с ником ".$_SESSION['userName']."!".'  Перейдите по ссылке и зайдите в чат чтобы посмотреть http://localhost:8080/accauntUser?id='.$id;
			if (!Chat::insertMassegeDatabase($chatID, $id, $text, $_SESSION['userId'])) {
				echo "False";
			}
			else {
				Chat::alertEmail($id, $massage);
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

		$massegeList = array();
		$massegeList = Chat::arrayMassege($chatID);
		$massegeList = array_reverse($massegeList);
		Chat::statusMassage($massegeList, $chatID, $id);
		$mass = array();
		foreach($massegeList as $massege) {
			array_push($mass, $massege);
		}

		print json_encode($mass);
	}

	public static function checkNewMassege() {
		$id = json_decode($_POST['id']);
		$id = intval(htmlentities($id));

		$arrChat = Chat::arrayChat($id);
		$arr = array();
		foreach($arrChat as $value) {
			array_push($arr, $value);
		}
//		file_put_contents("/Users/akolinko/lol", $arr, FILE_APPEND);
		print json_encode($arr);

	}
	public function newMassegeChat() {
		$id = json_decode($_POST['chatid']);
		$chatID = intval(htmlentities($id));

		$massegeList = array();
		$massegeList = Chat::arrayMassege($chatID);
		$massegeList = array_reverse($massegeList);
//		include('../views/partials/chat2.php');
		Chat::statusMassage($massegeList, $chatID, $id);
		$mass = array();
		foreach($massegeList as $massege) {
			array_push($mass, $massege);
		}

		print json_encode($mass);
	}


}