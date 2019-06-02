<?php
namespace App\Controllers;

use App\Models\User;

$userName = $_SESSION['userName'];

$user = User::userNameExists($userName);

$foto = User::userFoto($user->id);
