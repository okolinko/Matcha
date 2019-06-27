<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta charset="UTF-8">

		<title>MATCHA</title>

		<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="http://cdn.jsdelivr.net/emojione/1.3.0/lib/js/emojione.min.js"></script>
		<link rel="stylesheet" href="../../../public/css/style.css">

		<script type="text/javascript" src="../../../public/js/my.js"></script>
        <script type="text/javascript" src="../../../public/js/checkNewMassege.js"></script>
        <script type="text/javascript" src="../../../public/js/chat.js"></script>
        <script type="text/javascript" src="../../../public/js/navigation.js"></script>
	</head>
	<body>
		<?php require('avatar.php'); ?>

<!--        <script>-->
<!--            function position(pos){-->
<!--                                            var latitude = pos.coords.latitude;-->
<!--                                            var longitude = pos.coords.longitude;-->
<!--                                            var res;-->
<!--                                            var xhr = new XMLHttpRequest();-->
<!--                                            xhr.open("POST", "geolocation", false);-->
<!--                                            xhr.onreadystatechange = function () {-->
<!--                                                if (xhr.readyState == 4 && xhr.status == 200) {-->
<!--                                                    if ( xhr.responseText.indexOf("true") == -1)-->
<!--                                                        res = false;-->
<!--                                                    else-->
<!--                                                        res = true;-->
<!--                                                }-->
<!--                                            }-->
<!--                                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');-->
<!--                                            xhr.send('location=' + (latitude+' '+longitude));-->
<!--            }-->
<!---->
<!--            if(navigator.geolocation){-->
<!---->
<!--                navigator.geolocation.getCurrentPosition(position, function(e){-->
<!---->
<!--                        alert('Error.code: '+e.code+' Error.message: '+e.message);-->
<!---->
<!--                    }-->
<!--                );-->
<!---->
<!--            }else alert("Ваш браузер НЕ підтримує геолокацію.");-->
<!--        </script>-->

	<header>
		<div class="flex-top">
			<div class="avatar">
				<img class="avat" userId="<?php echo $_SESSION['userId'] ?>" src="../../../public/img/avatar/<?php echo $avatar ?>" alt="">
			</div>
			<?php if (isset($_SESSION['userId'])): ?>
				<div><span style="padding-left: 5%;" class="com"> Приветствуем вас,</span> <span class="user"> <?php echo ' '.$_SESSION['userName'].'!';?></span></div>
			<?php else: ?>
				<div><span class="com">Приветствуем вас,</span> <span class="user">Гость!</span></div>
			<?php endif; ?>
		</div>
		<br>
		<nav class="menu">
			<div class="openMenu" id="openMenu">MENU</div>
			<ul id="menu">
				<li><a href="/">Главная</a></li>
				<?php if ($_SESSION['userId']): ?>
				<li><a href="/datingUser">Поиск анкет</a></li>
				<li><a href="/likedUser">Понравившиеся</a></li>
<!--                <li><a href="#">####</a></li>-->
<!--				--><?php //if ($_SESSION['userId']): ?>
					<li><a href="/logout">Выход</a></li>
					<li><a href="/personalArea">Кабинет</a> </li>
				<?php else: ?>
					<li><a href="/login">Вход</a></li>
					<li><a href="/register">Регистрация</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</header>

