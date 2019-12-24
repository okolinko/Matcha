<?php

$paramPath = ROOT. "config.php";

if (file_exists($paramPath)) {
    $params = include($paramPath);
    $wow = mysqli_connect("localhost", $params['username'], $params['password']);
    $val = mysqli_query($wow, "show databases like 'matcha'");
    $res = mysqli_num_rows($val);
    if (!$res) {

        $query = mysqli_query($wow, "CREATE DATABASE IF NOT EXISTS `matcha`");
        $wow = mysqli_connect("localhost", $params['username'], $params['password'], $params['name']);

        $queryBase = file_get_contents('matcha.sql');
        $query = mysqli_multi_query($wow, $queryBase);
    }
}