<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Restore</title>
	<link rel="stylesheet" href="../../public/css/style_reg.css">
</head>
<body>
<div class="reg_but"><p><a href="/" ><img style="width: 60px" src="/public/img/home.png" alt="На главную"></a></p></div>
<div class="login">
	<h1>Востановление забытого пароля</h1>
	<?php if (isset($errors) && !empty($errors)): ?>
		<ul>
			<?php foreach ($errors as $error): ?>
				<?php echo "<script>alert(\"$error\");</script>"; ?>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<form method="post">
		<input type="email" name="email" placeholder="Введите свой email" required="required" value=""/>
		<input type="text" name="name" placeholder="Введите ваше имя" required="required" value=""/>
		<input type="password" name="password" placeholder="Введите новый пароль" required="required" value=""/>
		<input type="password" name="password2" placeholder="Введите пароль ещё раз" required="required" value=""/>
		<input style="width: 322px" type="submit" name="submit" class="btn1" value="Поменять пароль" />
	</form>
</div>
</body>
</html>
