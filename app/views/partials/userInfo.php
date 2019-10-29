<?php
//namespace App\Controllers;

use App\Models\User;

$userName = $_SESSION['userName'];

$userlike = User::userNameExists($userName);


