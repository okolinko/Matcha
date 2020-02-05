<?php require('partials/head.php');?>
<div><span class="name"><?php echo $userInfo->user_name?></span></div>
<div class="flex_user">
<!--    <div id="img" class="user_foto" userId="--><?php //echo $userId; ?><!--"><img id="user_avatar" src="--><?php //echo BASE_URL ?><!--public/img/avatar/avatar--><?php //echo $userId; ?><!--.png"</div>-->
        <div id="img" class="user_foto" userId="<?php echo $userId; ?>"><img id="user_avatar" src="<?php if (file_exists(ROOT."/public/img/avatar/avatar".$userId.".png")): ?><?php echo BASE_URL ?>public/img/avatar/avatar<?php echo $userId; ?><?php else: ?><?php echo BASE_URL."public/img/avatar/default"?><?php endif;?>.png"</div>
    <div id="like" ><img id="user_like" src="<?php echo BASE_URL?>public/img/<?php if($status == 1 ){echo "like_activ.png";}else{echo "like.png";}?>"</div>
    <?php if (!empty($userFoto)): ?>
        <div class="flex">
            <?php $i = 1; foreach ($userFoto as $foto_list): ?>
                <div id="<?php $i; echo "min".$i;?>" class="flex-itm"><img class="foto_us" src="<?php echo BASE_URL?>public/img/<?php $i += 1; echo $userId.'/'.$foto_list['img']?>"></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php require('partials/chat.php'); ?>
    <div class="info"><span class="help-info"> О бо мне: <?php echo '<div class="info2">'.$questionary->info.'</div>' ?></span></div>
    <div class="map">
        <iframe width="100%" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $location[0].",".$location[1]?>&amp;num=1&amp;vpsrc=5&amp;ie=UTF8&amp;t=m&amp;z=12&amp;ll=<?php echo $location[0].",".$location[1]?>&amp;output=embed"></iframe>
    </div>
</div>


<script type="text/javascript" src="<?php echo BASE_URL?>public/js/accaunt.js"></script>
<div  class="help-footer">
    <?php //require('partials/footer.php'); ?>
</div>