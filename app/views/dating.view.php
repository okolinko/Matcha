<?php require('partials/head.php'); ?>
<!--<h1>Поиск половинки</h1>-->
<br>
<div class="flex-container">
    <div class="flex-form">1</div>
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
