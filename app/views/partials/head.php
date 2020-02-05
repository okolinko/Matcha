<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MATCHA</title>
		<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo BASE_URL?>public/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL?>public/js/my.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>public/js/checkNewMassege.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>public/js/chat.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>public/js/ramdomMassege.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL?>public/js/accaunt.js"></script>
	</head>
	<body>
		<?php require('avatar.php'); ?>
        <header>
            <div class="flex-top">
                <div class="avatar">
                    <?php if ($_SESSION['userId']): ?>
                        <img class="avat" userId="<?php echo $_SESSION['userId'] ?>" src="<?php echo BASE_URL?>public/img/avatar/<?php echo $avatar ?>" alt="">
                    <?php endif; ?>
                </div>
                <?php if (isset($_SESSION['userId'])): ?>
                    <div>
                        <span style="padding-left: 5%;" class="com"> Приветствуем вас,</span> <span class="user"> <?php echo ' '.$_SESSION['userName'].'!';?></span>
                    </div>
                <?php else: ?>
                    <div>
                        <span class="com">Приветствуем вас,</span> <span class="user">Гость!</span>
                    </div>
                <?php endif; ?>
            </div>
            <br>
            <br>

            <nav class="menu">
                <div class="openMenu" id="openMenu">MENU</div>
                <ul id="menu">
                    <li><a class="cntr" href="/">Главная</a></li>
                    <?php if ($_SESSION['userId']): ?>
                        <li><a class="cntr" href="/datingUser">Поиск анкет</a></li>
                        <li><a class="cntr" href="/likedUser">Взаимные симпатии</a></li>
                        <li><a class="cntr" href="/iliked">Я понравился</a></li>
                        <li><a class="cntr" href="/visitors">Мои посетили</a></li>
                        <li><a class="cntr" href="/logout">Выход</a></li>
                        <li><a class="cntr" href="/personalArea">Кабинет</a> </li>
                    <?php else: ?>
                        <li><a class="cntr" href="/login">Вход</a></li>
                        <li><a class="cntr" href="/register">Регистрация</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

            <div class="test555">
                <?php if ($_SESSION['userId'] && strpos($_SERVER['REQUEST_URI'], 'accauntUser') == false): ?>
                    <?php require ROOT."/app/views/partials/global_chat.php" ?>
                <?php endif; ?>
            </div>
            <nav class="not">
                <ul class="not">

                </ul>
            </nav>
        </header>