<<<<<<< HEAD
<?php $structure = 'public/img/'."$userId";
$structure2 = 'public/img/'.$_SESSION['userId'];
$fi = new FilesystemIterator($structure, FilesystemIterator::SKIP_DOTS);
$fi2 = new FilesystemIterator($structure2, FilesystemIterator::SKIP_DOTS);
$fileCount = iterator_count($fi);
$fileCount2 = iterator_count($fi2);
//echo $structure;
if ($fileCount < 1 or $fileCount2 < 1) {
	return ;
=======
<?php
try {
    $structure = ROOT.'/public/img/' . "$userId";
    if (file_exists($structure)) {
        $fi = new FilesystemIterator($structure, FilesystemIterator::SKIP_DOTS);
        $fileCount = iterator_count($fi);
        if ($fileCount < 1) {
            return;
        }
    }
} catch (\Exception $e) {
    reportLog($e->getMessage());
>>>>>>> cbe35aea0f19a6d7c44e4f76807e16985ccfe6fb
}
?>

<?php
$res =  \App\Models\User::LikedUserInfo($userId);
$res2 =  \App\Models\User::LikedUserInfo($_SESSION['userId']);

$key = in_array($_SESSION['userId'], $res);
$key2 = in_array($userId, $res2);

if ($key == false || $key2 == false){
    return ;
}
;?>

<div class="container">
<!--    <a id="open" class="open">Открыть чат</a>-->
    <img id="open" class="open" src="<?php echo BASE_URL?>public/img/Chat.png" title="Открыть чат">
</div>
<div class="backpopup"></div>
<div class="popup-window">
    <p class="close">x</p>
    <div class="shoutbox">
        <h1>Matcha chat</h1>
        <ul id="ma" class="shoutbox-content">
        </ul>
        <div class="shoutbox-form">
            <li><textarea class="none" id="userId" name="id"><?php echo $userId?></textarea></li>
            <li><textarea class="none" id="sesionId" name="sesionId"><?php echo $_SESSION['userId']?></textarea></li>
            <li><textarea type="text" placeholder="Сообщение" id="shoutbox-comment" name="comment" maxlength='240' required="required"></textarea></li>
            <li> <input id="submit-massage" type="submit" value="Отправить!"></li>
        </div>
        <div class="smiles" style="width: 350px">
            <?php $i = 0; $smile = 128512;  while($i <= 79){
                echo '<a class="sm">&#'.$smile.'</a>';
                $smile++;
                $i++;

            };?>
        </div>
        <div class="ramdom_massage">
            <a class="ramdom_female" id="link">Случайное сообщени для знакомства с девушкой</a>
            <BR>
            <a class="ramdom_male" id="link2">Случайное сообщени для знакомства с парнем</a>
        </div>
    </div>
</div>