<?php

$wow = mysqli_connect("localhost", "akolinko", "kgdskk");
$val = mysqli_query($wow, "show databases like 'matcha'");
$res = mysqli_num_rows($val);
if (!$res) {

	$query = mysqli_query($wow, "CREATE DATABASE IF NOT EXISTS `matcha`");
	$wow = mysqli_connect("localhost", "akolinko", "kgdskk", "matcha");

	$queryBase = file_get_contents('matcha.sql');
	$query = mysqli_multi_query($wow, $queryBase);
}
