<?php require('partials/head.php');?>
<div><span class="name"><?php echo $userInfo->user_name?></span></div>
<div class="flex_user">
     <div id="img" class="user_foto" userId="<?php echo $userId; ?>"><img id="user_avatar" src="//matcha.loc/public/img/avatar/avatar<?php echo $userId; ?>.png"</div>
    <div id="like" ><img id="user_like" src="//matcha.loc/public/img/<?php if($status == 1 ){echo "like_activ.png";}else{echo "like.png";}?>"</div>
    <div class="flex">
		<?php if (!empty($userFoto)): ?>
		<?php $i = 1; foreach ($userFoto as $foto_list): ?>

		<div id="<?php $i; echo "min".$i;?>" class="flex-itm"><img class="foto_us" src="//matcha.loc/public/img/<?php $i += 1; echo $userId.'/'.$foto_list['img']?>"></div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<?php require('partials/chat.php'); ?>
    <div class="info"><span> О бо мне: <?php echo '<div class="info2">'.$questionary->info.'</div>' ?></span></div>
    <div class="map">
        <iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=<?php echo $location[0].",".$location[1]?>&amp;num=1&amp;vpsrc=0&amp;ie=UTF8&amp;t=m&amp;z=14&amp;ll=<?php echo $location[0].",".$location[1]?>&amp;output=embed"></iframe>
    </div>
    <?php require('../views/partials/chat2.php'); ?>
</div>


<script type="text/javascript" src="//matcha.loc/public/js/accaunt.js"></script>
<?php require('partials/footer.php'); ?>
