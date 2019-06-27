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

	public static function statusMassage($massegeList, $chatId, $userId) {

		$id = $massegeList[0]['id'];
		$sql = new self();
//		file_put_contents("/Users/akolinko/lol", $userId, FILE_APPEND);
		$response = $sql->db->updateStatus($id, $chatId, $userId);

	}

	public static function alertEmail($id, $massage) {

		$sql = new self();
		$response = $sql->db->selectOne('users', 'id', $id);
		$email = $response->email;
		if ($response->notification == 1) {
			mail($email, "Новое действие", $massage);
		}
	}

	public static function arrayChat($id) {
		$sql = new self();

		$response = $sql->db->selectOne('massege', 'user_id', $id);
		dd($response);
	}
}