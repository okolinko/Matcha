<?php
if (file_exists( 'public/img/'."$userId")) {
    $structure = 'public/img/' . "$userId";
    $fi = new FilesystemIterator($structure, FilesystemIterator::SKIP_DOTS);
    $fileCount = iterator_count($fi);
    if ($fileCount < 1) {
        return;
    }
    $res = \App\Models\User::LikedUserInfo($userId);
    $res2 = \App\Models\User::LikedUserInfo($_SESSION['userId']);

    $key = in_array($_SESSION['userId'], $res);
    $key2 = in_array($userId, $res2);

    if ($key == false or $key2 == false) {
        return;
    }
}
;?>

<div class="container">

<!--    <a id="open" class="open">Открыть чат</a>-->
    <img data-id="<?php print $_GET['id']?>" id="open" class="open" src="../../../public/img/Chat.png" title="Открыть чат">
</div>
<div class="backpopup"></div>
<div class="popup-window">
    <p class="close">x</p>
    <div class="shoutbox">
        <h1>Matcha chat</h1>
        <ul id="ma" class="shoutbox-content" style="width: 40rem;">
        </ul>
        <div class="shoutbox-form">
<!--            <div contenteditable="true" style="background: dimgrey; height: 250px" tabindex="5">Hello</div>-->
            <li><textarea  class="none" id="userId" name="id"><?php echo $userId?></textarea></li>
            <li><textarea class="none" id="sesionId" name="sesionId"><?php echo $_SESSION['userId']?></textarea></li>
            <li><textarea style="width: 35rem" type="text" placeholder="Сообщение" id="shoutbox-comment" name="comment" maxlength='240' required="required"></textarea></li>
            <li><textarea class="none" type="text" placeholder="Сообщение" id="shoutbox-comment2" name="comment" maxlength='240' required="required"></textarea></li>
            <li> <input style="cursor: pointer;width: 35rem" id="submit-massage" type="submit" value="Отправить!"></li>
        </div>
        <div class="smiles" style="width: 35rem">
            <?php $i = 0; $smile = 128512;  while($i <= 59){
                echo '<a class="sm" data-code='.$smile.' style="cursor: pointer">&#'.$smile.'</a>';
                $smile++;
                $i++;

            };?>
        </div>
        <div>
            <a id="link">Случайное сообщени для знакомства с девушкой</a>
            </BR>
            <a id="link2">Случайное сообщени для знакомства с парнем</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="/public/js/chat.js"></script>

<!--<script type="application/javascript" src="public/js/chat2.js"></script>-->