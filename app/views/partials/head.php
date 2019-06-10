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

	</head>
	<body>
		<?php require('avatar.php'); ?>
<!--        -->
<!--        <script>-->
<!--            function position(pos){-->
<!--// масив який містить назву міст та їх довготу і широту-->
<!--                var misto=[ {name:"Київ",lat: 50.45000 , lon: 30.52333 },-->
<!--                    {name:"Вінниця", lat: 49.23278 , lon: 28.46806},-->
<!--                    {name:'Дніпро', lat: 48.45000, lon: 34.98333},-->
<!--                    {name:'Донецьк', lat: 48.00278, lon: 37.80528},-->
<!--                    {name:'Маріуполь', lat: 47.09750, lon:37.54361},-->
<!--                    {name:'Житомир', lat: 50.25667, lon: 28.66417},-->
<!--                    {name:'Запоріжжя', lat: 47.84361, lon: 35.13056},-->
<!--                    {name:'Івано-Франківськ', lat: 48.92278, lon: 24.71028},-->
<!--                    {name:'Кропивницький', lat: 48.50917, lon: 32.25889},-->
<!--                    {name:'Луганськ', lat: 48.57444, lon: 39.30778},-->
<!--                    {name:'Луцьк', lat: 50.74722, lon: 25.32528},-->
<!--                    {name:'Львів', lat: 49.83917, lon: 24.02972},-->
<!--                    {name:'Миколаїв', lat: 46.97583, lon: 31.99472},-->
<!--                    {name:'Одеса', lat: 46.46667, lon: 30.73333},-->
<!--                    {name: 'Полтава', lat: 49.58944, lon: 34.55139},-->
<!--                    {name: 'Рівне', lat: 50.62111, lon: 26.25194},-->
<!--                    {name:'Суми', lat: 50.90722, lon: 34.79861},-->
<!--                    {name: 'Тернопіль', lat: 49.55306, lon: 25.59500},-->
<!--                    {name: 'Ужгород', lat: 48.62111, lon: 22.28778 },-->
<!--                    {name: 'Харків', lat: 50.00444, lon: 36.23139},-->
<!--                    {name:'Херсон',  lat: 46.63611, lon: 32.61694},-->
<!--                    {name:'Хмельницький', lat: 49.42194 , lon: 26.98972},-->
<!--                    {name:'Черкаси', lat: 49.44444, lon: 32.05972},-->
<!--                    {name:'Чернігів', lat: 51.50000, lon: 31.30000},-->
<!--                    {name:'Чернівці', lat: 48.29222, lon: 25.93500},-->
<!--                    {name:'Сімферополь', lat: 44.94806, lon: 34.10417}];-->
<!---->
<!--                for(i=0.001;i<4; i+=0.001)-->
<!--                    for(j=0; j<misto.length;j++){-->
<!--                        if((misto[j].lat<pos.coords.latitude+i && misto[j].lat>=pos.coords.latitude-i) && (misto[j].lon<pos.coords.longitude+i && misto[j].lon>=pos.coords.longitude-i)){ alert( misto[j].name );-->
<!--                                            var latitude = pos.coords.latitude;-->
<!--                                            var longitude = pos.coords.longitude;-->
<!--                                            // alert(latitude+' '+longitude);-->
<!--                                            var res;-->
<!--                                            var xhr = new XMLHttpRequest();-->
<!--                                            xhr.open("POST", "geolocation", false);-->
<!--                                            //-->
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
<!---->
<!--                        return; }-->
<!--                    }-->
<!--            }-->
<!---->
<!--            if(navigator.geolocation){-->
<!---->
<!--                navigator.geolocation.getCurrentPosition(position, function(e){-->
<!---->
<!--                        alert('Error.code: '+e.code+' Error.message: '+e.message);-->
<!--                    }-->
<!--                );-->
<!---->
<!--            }else alert("Ваш браузер НЕ підтримує геолокацію.");-->
<!--        </script>-->

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
				<li><a href="#">Понравившиеся</a></li>
<!--                <li><a href="#">####</a></li>-->
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

