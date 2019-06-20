<?php

namespace App\Models;


use App\Core\App;

class Chat {

	protected $db;

	public function __construct()
	{
		$this->db = App::get('database');
	}

	public static function insertMassegeDatabase($chatId, $userId, $text, $myId) {

		$status = 0;
		$chatId = intval($chatId);
		$userId = intval($userId);
		$myId = intval($myId);


		$sql = new self();
		$response = $sql->db->insertMassage($chatId, $myId, $text, $status);

		return true;
	}

}