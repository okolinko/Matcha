<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Regist</title>
	<link rel="stylesheet" href="../../public/css/style_reg.css" media="all"/>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
    <script type="text/javascript" src="//matcha.loc/public/js/navigation.js"></script>
</head>
<body>
	<div class="reg_but"><p><a href="/" ><img style="width: 60px; z-index: 1" src="/public/img/home.png" alt="На главную"></a></p></div>
<div id="reg_h1"><h1>Пройдите форму регистрации</h1></div>
	<div class="regist">
		<div id="error">
			<?php if (isset($errors) && !empty($errors)): ?>
				<ul>
					<?php foreach ($errors as $error): ?>
                        <?php echo '<span class="errorMes">'.$error.'</span>';?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	<form method="post">
		<input type="text" title="Имя должно начинаться с большой буквы и быть не короче 6 символов" name="name" placeholder="Введите имя" required="required" value="<?php echo $nameUser?>"/>
		<input type="password" title="Пароль должен быть не короче 6 символов" name="password" placeholder="Введите пароль" required="required" value=""/>
		<input type="password" name="password2" placeholder="Введите пароль ещё раз" required="required" value=""/>
		<input type="email" name="email" placeholder="Введите email" required="required" value="<?php echo $email?>"/>
		<input type="submit" name="submit" class="btn1" value="Регистрация" />
		</form>
</div>
</body>
</html>
