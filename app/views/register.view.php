<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Regist</title>
	<link rel="stylesheet" href="../../public/css/style_reg.css" media="all"/>

</head>
<body>
	<div class="reg_but"><p><a href="/" ><img id="button" src="/public/img/home.png" alt="На главную"></a></p></div>
<div id="reg_h1"><h1>Пройдите форму регистрации</h1></div>
	<div class="regist">
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
		<input type="text" name="name" placeholder="Введите имя" required="required" value=""/>
		<input type="password" name="password" placeholder="Введите пароль" required="required" value=""/>
		<input type="password" name="password2" placeholder="Введите пароль ещё раз" required="required" value=""/>
		<input type="email" name="email" placeholder="Введите email" required="required" value=""/>
		<input type="submit" name="submit" class="btn1" value="Регистрация" />
		</form>
</div>
</body>
</html>
