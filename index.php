<?php
date_default_timezone_set('Europe/Kiev');
require_once 'config/setup.php';
require 'vendor/autoload.php';
require 'core/bootstrap.php';
require 'core/helpers2.php';

use App\Core\Request;
use App\Core\Router;

define('ROOT', __DIR__ );
$protocol = "http://";
if (isset($_SERVER['HTTPS'])) {
    $protocol = 'https://';
}
if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
    $hostName = "";
} else {
    $hostName = $_SERVER['SERVER_NAME'];
}
define("BASE_URL", $protocol.$hostName."/");

session_start();

error_reporting(E_ALL, 1);

Router::load('app/routes.php')
	->direct(Request::uri(), Request::method());


