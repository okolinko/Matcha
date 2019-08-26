<?php require('partials/head.php'); ?>
<link rel="stylesheet" href="../../public/bootstrap-4.3.1/dist/css/bootstrap.min.css">
<script type="application/javascript" src="../../public/bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>
<style>

    /*body{*/
        /*height: 100% !important;*/
    /*}*/
    .list-group{
        /*position: relative;*/
        width: 400px;
        height: 100%;
        padding: 5px;
        margin-left: 10px;
        float: left;
        overflow: scroll;
        overflow-x: hidden;
    }

    .list-message{
        width: calc(100% - 450px);
        height: calc(100% - 20px);
        /*padding: 15px;*/
        /*margin-right: 15px;*/
        margin-left: 445px;
    }

    .item-group{
        /*display: flex;*/
        /*height: 65px;*/
        padding: 15px 10px 15px 25px;
        font-size: 25px;
        font-family: 'fantasy', cursive;
        margin-top: 3px;
        border: #6b85ff 1px solid;
        border-radius: 4px;
        background: top oldlace;
        cursor: pointer;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        overflow-wrap: break-spaces;
    }

    .item-group:hover{
        box-shadow: red 0px 0px 10px 3px;
    }

    .item-message{
        word-break: break-word;
        /*padding: 5px;*/
        font-family: 'fantasy', cursive;
        background: #32a1ce;
        margin: 3px;
        border-radius: 4px;

    }

    .item-message>p{
        color: crimson;
        margin-bottom: 2px;
    }

    .item-message>span{
       padding: 10px 20px 0px 40px;
    }

    .flex-container2 {
        height: calc(100% - 230px);
    }

    .text-message{
        display: flex;
        align-items: center;
        justify-content: center;
        /*height: 70px;*/
        /*position: relative;*/
        /*top: 300px;*/
    }

    .bottom-send:last-child>input{
        margin-bottom: 0px;
        margin-left: 10px;
        margin-top: 10px;
        width: 100px;
    }

    .text-message>textarea{
        display: block;
        width: calc(100% - 250px);
        background: rgba(0,0,0,0.3);
        outline: none;
        font-size: 17px;
        color: #fff;
        text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
        border: 1px solid rgba(0,0,0,0.3);
        border-radius: 7px;
        resize: none;
        height: 100px;

    }

    .messages{
        height: calc(100% - 150px);
        overflow: scroll;
        overflow-x: hidden;
    }

    .smile{
        margin: 10px;
        width: 400px;
    }

    .smile>a{
        margin: 2px;
    }

    .smile>a:hover{
       box-shadow: blue 0px 10px 10px 1px;
        border-radius: 100%;
        /*margin-left: 0px;*/
    }

    .bottom-send{
        width: calc(100% - 50px);
        display: flex;
        justify-content: space-between;
    }

    .bottom-send>button{
        margin-left: 25px;
        width: 100px;
    }
    .select{
        box-shadow: red 0px 0px 10px 3px;
    }

</style>
<div class="flex-container2">
    <div class="list-group" id="list-group">
        <?php  if (!empty($allGr)){
            $i = 0;
            while ($i < count($allGr)) {
                if ($i == 0)
                    print " <div data-id='item-group' id=\"{$allGr[$i]['gr_id']}\" class=\"item-group select\">{$allGr[$i]['user_name']}</div>";
                else
                    print " <div data-id='item-group' id=\"{$allGr[$i]['gr_id']}\" class=\"item-group\">{$allGr[$i]['user_name']}</div>";
                $i++;
            }
        }
        else
            print "У Вас нет чатов"
       ?>
    </div>
    <div class="list-message" id="list-message">
        <div class="messages" id="messages">
            <?php if (!empty($listMessages)){
                $i = 0;
                while ($i < count($listMessages)) {
                    print "
                     <div class=\"item-message\">
                        <p><strong>{$listMessages[$i]['user_name']}</strong> {$listMessages[$i]['m_created_at']}</p>
                        <span>{$listMessages[$i]['m_text']}</span>
                    </div>
                    ";
                    $i++;
                }
            }
            else print "У Вас нет сообщений"; ?>
        </div>
        <div class="text-message">
            <div class="smile">
                <?php $i = 0; $smile = 128512;  while($i <= 59){
                    echo '<a class="sm" style="cursor: pointer">&#'.$smile.'</a>';
                    $smile++;
                    $i++;

                };?>
            </div>
            <textarea id="text"></textarea>
            <div class="bottom-send">
                <button id="sendqw" class="btn btn-primary btn-group" type="button">Отправить</button>
            </div>
        </div>
    </div>
    <script type="application/javascript" src="../../public/js/chat2.js"></script>
</div>
