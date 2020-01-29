<?php
//namespace App\Controllers;

use App\Models\User;


function can_upload($file){
	if($file['name'] == '')
		return 'Вы не выбрали файл.';

	/* если размер файла больше  9000000, значит его не пропустили настройки
	сервера из-за того, что он слишком большой */
	if($file['size'] > 900000)
		return 'Файл слишком большой.';

	// разбиваем имя файла по точке и получаем массив
	$getMime = explode('.', $file['name']);
	$mime = strtolower(end($getMime));
	//массив допустимых расширений
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

	// если расширение не входит в список допустимых - return
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';

	return true;
}

function make_upload($file, $userId){
	// формируем уникальное имя картинки: случайное число и name
	$n = "avatar";
	$foto = "foto";
	$name = $n.$_SESSION['userId'];
	$structure = 'public/img/'."$userId";
	if (!is_dir($structure)) {
		if(!mkdir($structure, 0777, true)) {
			return 'Не удалось создать директории...';
		}
	}
	$fi = new FilesystemIterator($structure, FilesystemIterator::SKIP_DOTS);
	$fileCount = iterator_count($fi);

	if ($fileCount >= 5) {
		return 'Максимальное количество фотографий 5! Удалите одно из фото чтобы загрузить новое';
	}
	else {
		if(!file_exists('public/img/'."$userId".'/'.$foto.$_SESSION['userId']."_".'1.png'))
		{
			$name2 = $foto.$_SESSION['userId']."_1";
		}
		if(!file_exists('public/img/'."$userId".'/'.$foto.$_SESSION['userId']."_".'2.png'))
		{
			$name2 = $foto.$_SESSION['userId']."_2";
		}
		if(!file_exists('public/img/'."$userId".'/'.$foto.$_SESSION['userId']."_".'3.png'))
		{
			$name2 = $foto.$_SESSION['userId']."_3";
		}
		if(!file_exists('public/img/'."$userId".'/'.$foto.$_SESSION['userId']."_".'4.png'))
		{
			$name2 = $foto.$_SESSION['userId']."_4";
		}
		if(!file_exists('public/img/'."$userId".'/'.$foto.$_SESSION['userId']."_".'5.png'))
		{
			$name2 = $foto.$_SESSION['userId']."_5";
		}

//		$name2 = $foto.$_SESSION['userId']."_".($fileCount);
		User::addFoto($name2, $userId, ($name2.'.png'));

		copy($file['tmp_name'],  'public/img/'."$userId".'/'.$name2.'.png');
		copy($file['tmp_name'],  'public/img/avatar/'.$name.'.png');
	}
	return 'Файл успешно загружен';
}

$foto = User::userFoto($_SESSION['userId']);

function checkStatus($userid) {
	if (User::notificationStatus($userid) == 1) {
		return 0;
	}
	else {
		return 1;
	}
}


$location = User::parseLocation($_SESSION['userId']);