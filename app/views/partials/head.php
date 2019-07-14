<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MATCHA</title>

		<link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>


        <link rel="stylesheet" href="../../../public/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="http://cdn.jsdelivr.net/emojione/1.3.0/lib/js/emojione.min.js"></script>


		<script type="text/javascript" src="../../../public/js/my.js"></script>
        <script type="text/javascript" src="../../../public/js/checkNewMassege.js"></script>
        <script type="text/javascript" src="../../../public/js/chat.js"></script>
        <script type="text/javascript" src="../../../public/js/ramdomMassege.js"></script>

<!--        <script type="text/javascript" src="../../../public/js/index.js"></script>-->

<!--        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>-->

<!--        <link rel="stylesheet" href="../../../public/css/menu.css">-->
	</head>
	<body>

		<?php require('avatar.php'); ?>

	<header>
		<div class="flex-top">
			<div class="avatar">
				<?php if ($_SESSION['userId']): ?>
				<img class="avat" userId="<?php echo $_SESSION['userId'] ?>" src="../../../public/img/avatar/<?php echo $avatar ?>" alt="">
				<?php endif; ?>
            </div>
			<?php if (isset($_SESSION['userId'])): ?>
				<div><span style="padding-left: 5%;" class="com"> Приветствуем вас,</span> <span class="user"> <?php echo ' '.$_SESSION['userName'].'!';?></span></div>
			<?php else: ?>
				<div><span class="com">Приветствуем вас,</span> <span class="user">Гость!</span></div>
			<?php endif; ?>
		</div>
        <br>


        <br>

		<nav class="menu">
			<div class="openMenu" id="openMenu">MENU</div>
			<ul id="menu">
				<li><a href="/">Главная</a></li>
				<?php if ($_SESSION['userId']): ?>
				<li><a href="/datingUser">Поиск анкет</a></li>
				<li><a href="/likedUser">Взаимные симпатии</a></li>
                    <li><a href="/iliked">Я понравился</a></li>
                <li><a href="/visitors">Мои посетили</a></li>
<!--				--><?php //if ($_SESSION['userId']): ?>
					<li><a href="/logout">Выход</a></li>
					<li><a href="/personalArea">Кабинет</a> </li>
				<?php else: ?>
					<li><a href="/login">Вход</a></li>
					<li><a href="/register">Регистрация</a></li>
				<?php endif; ?>
			</ul>
		</nav>



        <nav class="not">
            <ul class="not">
                <li class="test555">
                    <img class="open" id="newMassege" src="../../../public/img/Chat.png" alt="12" title="Открыть чат" chatid="12">
                </li>
            </ul>
        </nav>
<!--        <div>-->
        <div class="backpopup"></div>
        <div class="popup-window">
            <p class="close">x</p>
            <div class="shoutbox">
                <h1>Matcha chat</h1>
                <ul id="ma" class="shoutbox-content">
                </ul>
                <div class="shoutbox-form">
<!--                               <div contenteditable="true" style="background: dimgrey; height: 250px" tabindex="5">Hello</div>-->
                    <li><textarea class="none" id="userId" name="id"><?php echo $userId?></textarea></li>
                    <li><textarea class="none" id="sesionId" name="sesionId"><?php echo $_SESSION['userId']?></textarea></li>
                    <li><textarea type="text" placeholder="Сообщение" id="shoutbox-comment" name="comment" maxlength='240' required="required"></textarea></li>
                    <li> <input id="submit-massage" type="submit" value="Отправить!"></li>
                </div>
                <div class="smiles" style="width: 350px">
					<?php $i = 0;  while($i <= 59){
						$img = "../../../public/img/smile/".$i.".png";
						echo '<span>
                <img class="emoji" alt='.$i.' src='.$img.'>
             </span>'; $i++;
					};?>
                </div>
                <div>
                    <a id="link">Случайное сообщени для знакомства с девушкой</a>
                    </BR>
                    <a id="link2">Случайное сообщени для знакомства с парнем</a>
                </div>
            </div>
        </div>
<!--        </div>-->
	</header>


