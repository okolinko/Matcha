<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo BASE_URL?>public/css/style_reg.css">
</head>
<body>
<div class="reg_but"><p><a href="/" ><img style="width: 60px"  src="<?php echo BASE_URL?>public/img/home.png" alt="На главную"></a></p></div>
<div class="login">
	<h1>Вход</h1>
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
        <input type="email" name="email" placeholder="Email" required="required" value="<?php echo $email?>">
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
