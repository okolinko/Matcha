<?php require('partials/head.php'); ?>

<div class="flex_user">
	<div><span class="name"><?php echo $userInfo->user_name?></span></div>
	<div id="img" class="user_foto"><img id="user_avatar" src="../../../public/img/avatar/avatar<?php echo $userId; ?>.png"</div>
	<div class="flex">
		<?php if (!empty($userFoto)): ?>
		<?php $i = 1; foreach ($userFoto as $foto_list): ?>

		<div id="<?php $i; echo "min".$i;?>" class="flex-itm"><img class="foto_us" src="/public/img/<?php echo $userId.'/'.$foto_list['img']?>"></div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<script type="text/javascript" src="../../../public/js/accaunt.js"></script>
<?php //require('partials/footer.php'); ?>
