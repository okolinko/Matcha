<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta charset="UTF-8">

		<title>MATCHA</title>

		<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="../../../public/css/style.css">

		<script type="text/javascript" src="../../../public/js/my.js"></script>

<!--        <script type="text/javascript" src="../../../public/js/test.js"></script>-->
	</head>
	<body>
		<?php require('avatar.php'); ?>

	<header>
		<div class="flex-top">
			<div class="avatar">
				<img class="avat" src="../../../public/img/avatar/<?php echo $avatar ?>" alt="">
			</div>
			<?php if (isset($_SESSION['userId'])): ?>
				<div><span style="padding-left: 5%;" class="com"> Приветствуем вас,</span> <span class="user"> <?php echo ' '.$_SESSION['userName'].'!';?></span></div>
			<?php else: ?>
				<div><span class="com">Приветствуем вас,</span> <span class="user">Гость!</span></div>
			<?php endif; ?>
		</div>
		<br>
		<nav class="">
			<div class="openMenu" id="openMenu">MENU</div>
			<ul id="menu">
				<li><a href="/">Главная</a></li>
				<li><a href="/datingUser">Поиск анкет</a></li>
				<li><a href="#">####</a></li>
				<?php if ($_SESSION['userId']): ?>
					<li><a href="/logout">Выход</a></li>
					<li><a href="/personalArea">Кабинет</a> </li>
				<?php else: ?>
					<li><a href="/login">Вход</a></li>
					<li><a href="/register">Регистрация</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</header>
