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
        <div class="form_container">
            <form action="/searchUser" method="post">
                <div><h2>Анкета</h2></div>
                <fieldset>
                    <div class="search_row">
                        <div class="search_column_2">
                            <label class="seeking">Ищу</label>
                            <select class="gender" name="search">
                                <option>Девушку</option>
                                <option>Парня</option>
                            </select>
                        </div>
                        <div class="search_column_2">
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
                        <div class="search_column_2">
                            <label>Ориентация</label>
                            <select class="gender" name="orientation">
                                <option>Гетеро</option>
                                <option>Би</option>
                                <option>ЛГБТ</option>
                            </select>
                        </div>
                        <div class="search_column_2">
                            <label>Радиус поиска</label>
                            <select class="gender" name="radius">
                                <option>2-5 км.</option>
                                <option>5-10 км.</option>
                                <option>10-20 км.</option>
                                <option>20-30 км.</option>
                                <option>Без разницы</option>
                            </select>
                        </div>
                    </div>

                    <div class="search_row">
<!--                        <div class="search_column_1">-->
<!--                            <label>Ваше имя</label>-->
<!--                        </div>-->
<!--                        <div class="search_column_2">-->
<!--                            <input type="text" name="name" value="" />-->
<!--                        </div>-->
<!--                        <div class="search_row">-->
<!--                            <div class="search_column_1">-->
<!--                                <label>Место проживания</label>-->
<!--                            </div>-->
<!--                            <div class="search_column_2">-->
<!--                                <input type="text" name="city" value="" />-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="search_row_last">
                            <input class="button2" name="submit" type="submit" value="Отправить" >
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
	<?php if (!empty($acaunt)): ?>
	<?php foreach ($acaunt as $acaunt_list): ?>
    <div class="flex-elem">
        <img class="foto-form"  src="../../public/img/avatar/avatar<?php echo $acaunt_list['userId']?>.png">
        <div class="name-form"><a><?php echo $acaunt_list['name'].', '.$acaunt_list['age']?></a></div>
        <div class="city-form"><a><?php echo $acaunt_list['city']?></a></div>
        <div class="form-help"><a href="#" class="button"/>В профиль</a></div>
    </div>
		<?php endforeach; ?>
	<?php endif; ?>

</div>
<?php //require('partials/footer.php'); ?>
