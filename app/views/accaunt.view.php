<?php require('partials/head.php'); ?>
<?php require('partials/downloadFoto.php'); ?>

    <div id="error">
		<?php if (isset($errors) && !empty($errors)): ?>
            <ul>
				<?php foreach ($errors as $error): ?>
					<?php echo "<script>alert(\"$error\");</script>"; ?>
				<?php endforeach; ?>
            </ul>
		<?php endif; ?>
    </div>
	<div class="info_flex">
		<div class="email">
			<form action="/personalArea/edit/" method="post">
				<input class="edit_password" type="submit" value="Изменить пароль" />
			</form>
		</div>
        <div class="email">
            <form action="/personalArea/edit/email" method="post">
                <input class="edit_password" type="submit" value="Изменить email" />
            </form>
        </div>
		<div class="email">
			<form action="/personalArea/delete/" method="post">
				<input class="dell_acc" type="submit" value="Удалить аккаунт" />
			</form>
		</div>
	</div>
	<div class="down_im">
		<form method="post" enctype="multipart/form-data">
			<input class="down_avatar" type="file" name="file" multiple accept="image/*">
			<input class="down_avatar" id="down_av" type="submit" value="Загрузить аватар!">
		</form>
		<?php
		if(isset($_FILES['file'])) {
			// проверяем, можно ли загружать изображение
			$check = can_upload($_FILES['file']);

			if($check === true){
				// загружаем изображение на сервер
				$res =  make_upload($_FILES['file'], $_SESSION['userId'] );
				echo "<script>alert(\"$res!\");</script>";
				echo "<script>alert(\"Файл успешно загружен!\");</script>";
			}
			else{
				// выводим сообщение об ошибке
				echo "<script>alert(\"$check!\");</script>";
			}
		}
		?>
	</div>
			<div>
				<form action="personalArea/notifications" method="post">
					<input class="<?php if(checkStatus($_SESSION['userId']) == 1) {echo "sendEmailActiv";} ?>" type="submit" value="Уведомления на email" />
				</form>
			</div>
    <div style="height: 100%">
        <iframe width="619" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=50.4691,30.4664&amp;num=1&amp;vpsrc=0&amp;ie=UTF8&amp;t=m&amp;z=14&amp;ll=50.4691,30.4664&amp;output=embed"></iframe>
    </div>
    <div class="form_container">
        <form action="/profile" method="post">
            <div><h2>Анкета</h2></div>
            <fieldset>
                <div class="search_row">
                    <div class="search_column_1">
                        <label>Я</label>
                    </div>
                    <div class="search_column_2">
                        <select class="gender" name="im">
                            <option>Парень</option>
                            <option>Девушка</option>
                        </select>
                        <label class="seeking">Ищю</label>
                        <select class="gender" name="search">
                            <option>Девушку</option>
                            <option>Парня</option>
                            <option>Без разницы</option>
                        </select>
                    </div>
                </div>
            <br>
                <div class="search_row">
                    <div class="search_column_1">
                        <label>Укажите ваш полный возраст</label>
                    </div>
                    <div class="search_column_2">
                        <input type="data" name="age" value="" />
                    </div>
                </div>
                <div class="search_row">
                    <div class="search_column_1">
                        <label>Ваше имя</label>
                    </div>
                    <div class="search_column_2">
                        <input type="text" name="name" value="" />

                    </div>
                </div>
                <div class="search_row last">
                        <input id="navigat" name="submit" type="submit" value="Отправить" >
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <section class="wrap">
        <div class="foto_ac" >
			<?php if (!empty($foto)): ?>
				<?php foreach ($foto as $foto_list): ?>

                    <div class="flex_acc">
                        <img class="accaunt_foto" src="/public/img/<?php echo $_SESSION['userId'].'/'.$foto_list['img']?>">
                        <img name="delete"  class="delete" id="<?php echo $foto_list['id'] ?>" src="/public/img/dell_foto.png">
                    </div>
				<?php endforeach; ?>
			<?php endif; ?>
        </div>
    </section>
    <script>
            navigat.onclick = function() {
            if(navigator.geolocation) {

                navigator.geolocation.getCurrentPosition(function(position) {
                    // alert(11);
                    var latitude = position.coords.latitude;
                    // alert(111);
                    var longitude = position.coords.longitude;
                    alert(latitude+' '+longitude);
                    var res;
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "profile", false);

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            if ( xhr.responseText.indexOf("true") == -1)
                                res = false;
                            else
                                res = true;
                        }
                    }
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.send('location=' + (latitude+' '+longitude));
                });

            } else {
                alert("Geolocation API не поддерживается в вашем браузере");
            }
        };
    </script>
    <script type="text/javascript" src="../../../public/js/deleteImg.js"></script>
<?php //require('partials/footer.php'); ?>