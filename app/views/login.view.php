<?php
$client_id = '6166045e4efb40469480d510832814d2'; // Client ID
//$client_secret = '798d32386b464a56a8878344bb8c06c9 '; // Client secret
$redirect_uri = 'http://localhost/signupSocialNetwork'; // Redirect URI

$url = 'https://api.instagram.com/oauth/authorize/';
$params = [
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code'
];

$link = '<p ><a href="' . $url . '?' . urldecode(http_build_query($params)) . '"><img  style="width: 100%" src="/public/google.png" alt=""></a></p>';


?>

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
    <div>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required="required">
            <input type="password" name="password" placeholder="Пароль" required="required">
            <input type="submit" name="submit" class="btn1" value="Войти" />
        </form>
        <?php echo $link; ?>
    </div>
</div>
<div>
	<form action="login/restore" method="post">
		<input type="submit" value="Востановить забытый пароль" />
	</form>
</div>
</body>

</html>
