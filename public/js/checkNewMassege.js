$(document).ready(function () {

    var userId = $(".avat").attr('userid');
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
                    var i = 0;
                    var len = chat.length;

                    if (test.length === 0) {
                        while (i < len) {
                            test[i] = chat[i]['count'];
                            i++;
                        }
                    }

                    i = 0;
                    while (i < len) {
                        if (test[i] === chat[i]['count']) {
                            i++;
                            continue;
                        }
                        var j = 0;
                        var smile = 128512;
                        var kekSmile = Array();
                        while (j <= 79 ) {
                            kekSmile.push("<a class='sm'>&#" + smile + "</a>");
                            smile++;
                            j++;

                        }
                        var current_url = window.location.protocol + "//" + window.location.host;
                        var str = chat[i]['chat_id'].replace(userId, "");
                        var code = '<a href="javascript:void(0);"><img id="newMassege" class="open" title="Открыть чат" src="' + current_url + '/public/img/Chat.png" /></a>';
                        $("#userId").text(str);
                        $("#sesionId").text(userId);
                        $(".smiles").append(kekSmile.join(''));
                        $('.test555').append(code);
                        test[i] = chat[i]['count'];
                        i++;
                    }

                }
            }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('id=' + userId);
    }, 2000);

    $(document).click(function (event) {
        if ($(event.target).closest('#newMassege').length) {
            $('.popup-window').popup();
            checkMessage();
        }

        if ($(event.target).closest('.backpopup,.close').length) {
            $('.popup-window').fadeOut();
            $('.backpopup').fadeOut();
        }


    });


    function checkMessage() {
        var massegeReload = document.getElementById("ma");
        var userId = document.getElementById("userId").value;
        var sesionId = document.getElementById("sesionId").value;

        setInterval(function () {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "reloadMassage", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText) {
                        var comment = new Object();
                        comment = JSON.parse(xhr.responseText);

                        $('.massage').remove();
                        $('.massage2').remove();
                        $('.date').remove();
                        for (i = 0; i < comment.length; i++) {
                            var li = document.createElement('li');
                            if (i == 0) {
                                var li3 = document.createElement('li');
                                li3.className = "date";
                                li3.innerHTML = comment[0]['date'];
                                massegeReload.appendChild(li3);
                            }
                            var cla;
                            if (i > 0 ) {
                                if (comment[i]['date'] != comment[i - 1]['date']) {
                                    var li2 = document.createElement('li');
                                    li2.className = "date";
                                    li2.innerHTML = comment[i]['date'];
                                    massegeReload.appendChild(li2);
                                }
                            }
                            if (comment[i]['user_id'] == sesionId) {
                                if (comment[i]['status'] == 0) {
                                    cla = 'class="unread"';
                                } else {
                                    cla = 'class="chatIm"';
                                }
                                li.className = "massage2";
                                li.innerHTML = '<span ' + cla + '>' + comment[i]['text'] + '</span>   ' + '<span class="time" >' + comment[i]['time'] + '</span>';
                            } else {
                                li.className = "massage";
                                li.innerHTML = '<span class="time" >' + comment[i]['time'] + '</span>' + '   ' + '<span class="chat_u" >' + comment[i]['text'] + '</span>';
                            }
                            massegeReload.appendChild(li);
                        }
                    }
                }
            };
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + userId);
        }, 1000);
    };


});
