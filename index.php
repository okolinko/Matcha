<?php
date_default_timezone_set('Europe/Kiev');
require_once 'config/setup.php';
require 'vendor/autoload.php';
require 'core/bootstrap.php';
require 'core/helpers2.php';

use App\Core\Request;
use App\Core\Router;

session_start();

error_reporting(E_ALL, 1);

Router::load('app/routes.php')
	->direct(Request::uri(), Request::method());


