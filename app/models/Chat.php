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

	public static function arrayMassege($chatId) {

		$sql = new self();
		$response = $sql->db->selectAll('massege');
		$com_arr  = array();
		$i = 0;
		while($response[$i])
		{
			if ($response[$i]->chat_id == $chatId) {
				$com_arr[$i]['id'] = $response[$i]->id;
				$com_arr[$i]['chat_id'] = $response[$i]->chat_id;
				$com_arr[$i]['user_id'] = $response[$i]->user_id;
				$com_arr[$i]['text'] = '<code>' . $response[$i]->text . '</code>';
				$com_arr[$i]['time'] = substr($response[$i]->time, 0,5);
				$com_arr[$i]['date'] = $response[$i]->date;
				$com_arr[$i]['status'] = $response[$i]->status;
			}
			$i++;
		}
		return ($com_arr);
	}
}