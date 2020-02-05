<?php
$structure = 'public/img/'."$userId";
$structure2 = 'public/img/'.$_SESSION['userId'];
$fi = new FilesystemIterator($structure, FilesystemIterator::SKIP_DOTS);
$fi2 = new FilesystemIterator($structure2, FilesystemIterator::SKIP_DOTS);
$fileCount = iterator_count($fi);
$fileCount2 = iterator_count($fi2);
if ($fileCount < 1 or $fileCount2 < 1) {
    return ;
}
$res =  \App\Models\User::LikedUserInfo($userId);
$res2 =  \App\Models\User::LikedUserInfo($_SESSION['userId']);

$key = in_array($_SESSION['userId'], $res);
$key2 = in_array($userId, $res2);

if ($key == false  or  $key2 == false){
    return ;
}
?>
<div class="backpopup"></div>
<div class="popup-window">
    <p class="close">x</p>
    <div class="shoutbox">
        <h1>Matcha chat</h1>
        <ul id="ma" class="shoutbox-content">
        </ul>
        <div class="shoutbox-form">
            <li><textarea class="none" id="userId" name="id"></textarea></li>
            <li><textarea class="none" id="sesionId" name="sesionId"></textarea></li>
            <li><textarea type="text" placeholder="Сообщение" id="shoutbox-comment" name="comment" maxlength='240' required="required"></textarea></li>
            <li> <input id="submit-massage" type="submit" value="Отправить!"></li>
        </div>
        <div class="smiles" style="width: 350px">
        </div>
        <div class="ramdom_massage">
            <a class="ramdom_female" id="link">Случайное сообщени для знакомства с девушкой</a>
            <BR>
            <a class="ramdom_male" id="link2">Случайное сообщени для знакомства с парнем</a>
        </div>
    </div>
</div>