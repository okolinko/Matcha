<?php require('partials/head.php'); ?>
<?php require('partials/downloadFoto.php'); ?>
    <script type="text/javascript" src="//matcha.loc/public/js/navigation.js"></script>
    <div id="error">
		<?php if (isset($errors) && !empty($errors)): ?>
            <ul>
				<?php foreach ($errors as $error): ?>
					<?php echo "<script>alert(\"$error\");</script>"; ?>
				<?php endforeach; ?>
            </ul>
		<?php endif; ?>
    </div>
<div class="flex-cab">
    <div class="form_flex">
        <form action="/profile" method="post">
            <div><h2 style="margin-left: 30%">Моя анкета</h2></div>
            <fieldset class="fon">
                <div class="search_row">
         <div>
                    <label>Я</label>
                        <div class="styled-select black rounded">

                        <select  name="im">
                            <option class="m">Парень</option>
                            <option class="m">Девушка</option>
                        </select>
                        </div>
         </div>
                    <div class="left_left">
                    <label class="seeking">Ищу</label>
                            <div class="styled-select black rounded">
                        <select  name="search">
                            <option>Девушку</option>
                            <option>Парня</option>
                            <option>Без разницы</option>
                        </select>
                    </div>
                    </div>
                </div>
                <br>
                    <div class="search_column_2">
                        <input class="wid5s" type="data" placeholder="Полный возраст" name="age" value="" />
                    </div>
                    <div class="search_column_2">
                        <input class="wid5s" type="text" placeholder="Ваше имя" name="name" value="" />
                    </div>
                        <div class="search_column_2">
                            <input class="wid5s" type="text" placeholder="Место проживания" name="city" value="" />
                        </div>
                            <div id="addComment">
                                <center><textarea type="text" name="info" cols="22" rows="3"   id="comment" placeholder="О себе  # " class="textbox"></textarea></center>
                            </div>
                    <div class="search_row_last">
                        <input class="button2" name="submit" type="submit" value="Отправить" >
                    </div>
            </fieldset>
        </form>
    </div>
        <div class="down_im">
            <form method="post" enctype="multipart/form-data">
                <input class="down_avatar" type="file" name="file" multiple accept="image/*">
                <input class="down_avatar2" id="down_av" type="submit" value="Загрузить фото!">
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
        <div class="change">
            <div class="passw">
                <form action="//matcha.loc/personalArea/edit/" method="post">
                    <input class="edit_password" type="submit" value="Изменить пароль" />
                </form>
            </div>
            <div class="email">
                <form action="//matcha.loc/personalArea/edit/email" method="post">
                    <input class="edit_password" type="submit" value="Изменить email" />
                </form>
            </div>
            <div class="notif">
                <form action="//matcha.loc/personalArea/notifications" method="post">
                    <input class="<?php if(checkStatus($_SESSION['userId']) == 1) {echo "sendEmailActiv";} ?>" type="submit" value="Уведомления на email" />
                </form>
            </div>
            <div class="dell">
                <form action="//matcha.loc/personalArea/delete/" method="post">
                    <input class="dell_acc" type="submit" value="Удалить аккаунт!" />
                </form>
            </div>
            <div class="geo">
<!--                <form action="#" method="post">-->
                    <input class="btn1" type="submit" value="Отобразить текущую геолокацию!" />
<!--                </form>-->
            </div>
            <div class="geo">
                <input class="cord"  type="text" placeholder="Изменить кординаты в ручную" />
            </div>

        </div>
</div>
    <div class="map_user">
        <iframe id="inlineFrameExample"
                title="Inline Frame Example"
                width="100%"
                height="230"  src="https://maps.google.com/maps?q=<?php echo $location[0].",".$location[1]?>&amp;num=1&amp;vpsrc=0&amp;ie=UTF8&amp;t=m&amp;z=12&amp;ll=<?php echo $location[0].",".$location[1]?>&amp;output=embed"></iframe>
    </div>

    <section class="wrap">
        <center><div class="foto_ac" >
				<?php $structure = 'public/img/'."$userId";
				$fi = new FilesystemIterator($structure, FilesystemIterator::SKIP_DOTS);
				$fileCount = iterator_count($fi);
				if ($fileCount < 1) {
					echo '<span class="down_foto" >'."Загрузите своё фото чтобы иметь возможность общаться с другими пользователями!".'</span>';
				}?>
			<?php if (!empty($foto)): ?>
				<?php foreach ($foto as $foto_list): ?>

                    <div class="flex_acc">
                        <img class="accaunt_foto" src="/public/img/<?php echo $_SESSION['userId'].'/'.$foto_list['img']?>">
                        <img name="delete"  class="delete" id="<?php echo $foto_list['id'] ?>" src="/public/img/dell_foto.png">
                    </div>
				<?php endforeach; ?>
			<?php endif; ?>
            </div></center>
    </section>
    <script type="text/javascript" src="//matcha.loc/public/js/deleteImg.js"></script>
<?php //require('partials/footer.php'); ?>