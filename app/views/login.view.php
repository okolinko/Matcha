<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../../public/css/style_reg.css">
</head>
<body>
<div class="reg_but"><p><a href="/" ><img style="width: 60px"  src="/public/img/home.png" alt="На главную"></a></p></div>
<div class="login">
	<h1>Вход</h1>
 <div id="error">
	 <?php if (isset($errors) && !empty($errors)): ?>
		 <ul>
			 <?php foreach ($errors as $error): ?>
				<?php echo "<script>alert(\"$error\");</script>"; ?>
			 <?php endforeach; ?>
		 </ul>
	 <?php endif; ?>
 </div>
	<form method="post">
		<input type="email" name="email" placeholder="Email" required="required">
		<input type="password" name="password" placeholder="Пароль" required="required">
		<input type="submit" name="submit" class="btn1" value="Войти" />
	</form>
</div>
<div>
	<form action="login/restore" method="post">
		<input type="submit" value="Востановить забытый пароль" />
	</form>
</div>
</body>

</html>
