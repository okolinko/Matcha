<?php $userId = 2;?>
<div class="container">
	    <a id="open" class="open">Открыть чат</a>
	<img id="open" class="open" src="//matcha.loc/public/img/Chat.png" title="Открыть чат">
</div>
<div class="backpopup"></div>
<div class="popup-window">
	<p class="close">x</p>
	<div class="shoutbox">
		<h1>Matcha chat</h1>
		<ul id="ma" class="shoutbox-content">
		</ul>
		<div class="shoutbox-form">
			<!--            <div contenteditable="true" style="background: dimgrey; height: 250px" tabindex="5">Hello</div>-->
			<li><textarea class="none" id="userId" name="id"><?php echo $userId?></textarea></li>
			<li><textarea class="none" id="sesionId" name="sesionId"><?php echo $_SESSION['userId']?></textarea></li>
			<li><textarea type="text" placeholder="Сообщение" id="shoutbox-comment" name="comment" maxlength='240' required="required"></textarea></li>
			<li> <input id="submit-massage" type="submit" value="Отправить!"></li>
		</div>
        <div class="smiles" style="width: 350px">
			<?php $i = 0; $smile = 128512;  while($i <= 59){
				echo '<a class="sm">&#'.$smile.'</a>';
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