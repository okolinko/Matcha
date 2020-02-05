<?php require('partials/head.php'); ?>
<div id="error">
	<?php if (isset($errors) && !empty($errors)): ?>
        <ul>
			<?php foreach ($errors as $error): ?>
				<?php echo "<script>alert(\"$error\");</script>"; ?>
			<?php endforeach; ?>
        </ul>
	<?php endif; ?>
</div>
<br>
<div class="flex-container">
    <div class="flex-form">
       <center><div class="form_container">
            <form action="/searchUser" method="post">
                <div><h2>Анкета</h2></div>
                <fieldset style="height: 285px">
                    <div class="search_row">
                        <div>
                            <label class="seeking">Ищу</label>
                            <select class="gender" name="search">
                                <option>Девушку</option>
                                <option>Парня </option>
                            </select>
                        </div>
                        <div>
                            <label class="seeking">Возраст</label>
                            <select class="gender" name="age">
                                <option>18-21</option>
                                <option>21-25</option>
                                <option>25-30</option>
                                <option>30-35</option>
                                <option>35-40</option>
                                <option>40-45</option>
                                <option>45-55</option>
                                <option>55-60</option>
                            </select>
                        </div>
                        <div>
                            <label>Ориентация</label>
                            <select class="gender" name="orientation">
                                <option>Гетеро</option>
                                <option>Би</option>
                                <option>ЛГБТ</option>
                            </select>
                        </div>
                        <div>
                            <label>Радиус поиска</label>
                            <select class="gender" name="radius">
                                <option>2-5 км.</option>
                                <option>5-10 км.</option>
                                <option>10-20 км.</option>
                                <option>20-30 км.</option>
                                <option>Без разницы</option>
                            </select>
                        </div>
                        <div>
                            <label>Уровень славы</label>
                            <select class="glory" name="glory">
                                <option>&#9733;</option>
                                <option>&#9733; &#9733;</option>
                                <option>&#9733; &#9733; &#9733;</option>
                            </select>
                        </div>
                        <div>
                            <label>Интересы</label>
                           <textarea type="text" name="interesting" cols="22" rows="2"  placeholder=" # " class="interesting"></textarea>
                        </div>
<!--                        </div>-->
                    </div>

                    <div class="top">
                            <input class="button2" name="submit" type="submit" value="Отправить" >
                    </div>
                </fieldset>
            </form>
           </div></center>
    </div>
	<?php if (!empty($acaunt)): ?>
	<?php foreach ($acaunt as $acaunt_list): ?>
    <div class="flex-elem">
        <img class="foto-form"  src="<?php if (file_exists(ROOT."/public/img/avatar/avatar".$acaunt_list['userId'].".png")): ?><?php echo BASE_URL ?>public/img/avatar/avatar<?php echo $acaunt_list['userId']; ?><?php else: ?><?php echo BASE_URL."public/img/avatar/default"?><?php endif;?>.png">
        <img id="ban" class="ban" <?php if ($acaunt_list['ban'] == 1) echo 'src="'. BASE_URL .'public/img/ban.png"'; else  echo 'src="'. BASE_URL .'public/img/ban_n.png"' ?> value="<?php echo $acaunt_list['userId']?>">
        <div class="name-form"><a><?php echo $acaunt_list['name'].', '.$acaunt_list['age']?></a></div>
        <div class="city-form"><a><?php echo $acaunt_list['city']?></a></div>
        <div class="form-help"><a id="id-user" user_id="<?php echo $acaunt_list['userId'] ?>" href="/accauntUser?id=<?php echo $acaunt_list['userId'] ?>" class="button"/>В профиль</a></div>
<!--        <div class="form-help"><a id="id-user" user_id="--><?php //echo $acaunt_list['userId'] ?><!--" href="#accauntUser?id=--><?php //echo $acaunt_list['userId'] ?><!--" class="button"/>В профиль</a></div>-->
    </div>
		<?php endforeach; ?>
	<?php endif; ?>
<?php //echo $pag; ?>
</div>

<div class="pagination_centr">
    <?php echo $pag; ?>
</div>
<script type="text/javascript" src="<?php echo BASE_URL?>public/js/trackVisits.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL?>public/js/ban.js"></script>
<?php //require('partials/footer.php'); ?>
