<?php require('partials/head.php'); ?>

    <div class="flex-container">
        <div class="flex-liked"><a class="sim">Симпатии</a></div>

        <?php if (!empty($acaunt)): ?>
		<?php foreach ($acaunt as $acaunt_list):  ?>
            <div class="flex-elem">
                <img class="foto-form"  src="<?php if (file_exists(ROOT."public/img/avatar/avatar".$acaunt_list['id_user'].".png")): ?><?php echo BASE_URL ?>public/img/avatar/avatar<?php echo $acaunt_list['id_user']; ?><?php else: ?><?php echo BASE_URL."public/img/avatar/default"?><?php endif;?>.png">
                <div class="name-form"><a><?php echo $acaunt_list['name'].', '.$acaunt_list['age']?></a></div>
                <div class="city-form"><a><?php echo $acaunt_list['city']?></a></div>
                <div class="form-help"><a href="<?php echo BASE_URL ?>accauntUser?id=<?php echo $acaunt_list['id_user'] ?>" class="button"/>В профиль</a></div>
            </div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
<?php //require('partials/footer.php'); ?>