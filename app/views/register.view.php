<?php
$client_id = '624678039195-hli1h1c4bu2kgfoktu8qq6s1oo2da4i7.apps.googleusercontent.com'; // Client ID
$client_secret = 'pekbuetluogaQocBbqNibVOX'; // Client secret
$redirect_uri = 'https://lite.camagru.website/signupSocialNetwork'; // Redirect URI

$url = 'https://accounts.google.com/o/oauth2/auth';
$params = array(
'redirect_uri'  => $redirect_uri,
'response_type' => 'code',
'client_id'     => $client_id,
'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
);

$link = '<p ><a href="' . $url . '?' . urldecode(http_build_query($params)) . '"><img  style="width: 100%" src="/public/google.png" alt=""></a></p>';


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Regist</title>
	<link rel="stylesheet" href="../../public/css/style_reg.css" media="all"/>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
    <script type="text/javascript" src="../../../public/js/navigation.js"></script>
</head>
<body>
	<div class="reg_but"><p><a href="/" ><img style="width: 60px" src="/public/img/home.png" alt="На главную"></a></p></div>
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
        <?php echo $link; ?>
</div>
</body>
</html>
