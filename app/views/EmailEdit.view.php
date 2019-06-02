<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>editEmail</title>
	<link rel="stylesheet" href="../../public/css/style_reg.css">
</head>
<body>
<div class="reg_but"><p><a href="/" ><img id="button" src="/public/img/home.png" alt="На главную"></a></p></div>
<div class="login">
	<h1>Изменение email</h1>
	<?php if (isset($errors) && !empty($errors)): ?>
		<ul>
			<?php foreach ($errors as $error): ?>
				<?php echo "<script>alert(\"$error\");</script>"; ?>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<form method="post">
        <input type="email" name="email" placeholder="Введите старый email" required="required" value=""/>
		<input type="password" name="password" placeholder="Введите пароль" required="required" value=""/>
		<input type="email" name="email1" placeholder="Введите новый email" required="required" value=""/>
		<input type="email" name="email2" placeholder="Введите email ещё раз" required="required" value=""/>
		<input style="width: 322px" type="submit" name="submit" class="btn1" value="Сохранить" />
	</form>
</div>
</body>
</html>