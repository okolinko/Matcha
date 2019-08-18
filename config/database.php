<?php

$wow = mysqli_connect("camagru.mysql.tools", "camagru_matcha", "j(7*cJ01gM");
$val = mysqli_query($wow, "show databases like 'camagru_matcha'");
$res = mysqli_num_rows($val);
if (!$res) {

	$query = mysqli_query($wow, "CREATE DATABASE IF NOT EXISTS `camagru_matcha`");
	$wow = mysqli_connect("localhost", "akolinko", "kgdskk", "camagru_matcha");

	$queryBase = file_get_contents('matcha.sql');
	$query = mysqli_multi_query($wow, $queryBase);
}
