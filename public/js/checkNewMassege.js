$(document).ready(function () {

    var userId = $('.avat').length;
var test = [];
    setInterval(function () {
        'use strinc';
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "checkNewMassege", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                if (xhr.responseText) {
                    var chat = new Object();
                    chat = JSON.parse(xhr.responseText);
                    // console.log(chat);
                    // alert();
                    var i = 0;
                    var len  = chat.length;

                    // console.log(test);
                    if (test.length === 0) {
                        while (i < len) {
                            test[i] = chat[i]['count'];
                            i++;
                        }
                    }

                    i = 0;
                    while (i < len){
                        if (test[i] === chat[i]['count']) {
                            i++;
                            continue ;
                        }
                        // alert("Mesage of chat_id = " + chat[i]['chat_id']);
                        jQuery('<a>', {
                            href: userId
                        }).appendTo('.test555');
                        jQuery('<img/>', {
                            class: 'open',
                            id: 'newMassege',
                            src: '//matcha.loc/public/img/Chat.png',
                            alt: chat[i]['chat_id'],
                            title: 'Открыть чат',
                            chatid: chat[i]['chat_id']


                        }).appendTo('.test555');
                        test[i] = chat[i]['count'];
                        i++;
                    }

                }
            }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('id=' + userId);
    }, 2000);

});
