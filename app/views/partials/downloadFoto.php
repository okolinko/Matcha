<?php

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

function make_upload($file){
	// формируем уникальное имя картинки: случайное число и name
	$n = "avatar";
	$name = $n.$_SESSION['userId'];
	copy($file['tmp_name'],  'public/img/avatar/'.$name.'.png');
}