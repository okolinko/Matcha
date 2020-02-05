$(document).ready(function () {
     $('.open').click(function () {
        $('.popup-window').popup();
    });
    $('.backpopup,.close').click(function () {
        $('.popup-window').fadeOut();
        $('.backpopup').fadeOut();
    });

    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
    }

    if (findGetParameter("open") == 1) {
        setTimeout(function(){$('#open').click();}, 100);
    }

});

$.fn.popup = function () {
    this.css('position', 'absolute').fadeIn();
    this.css('top', ($(window).height() - this.height()) / 2 + $(window).scrollTop() + 'px');
    this.css('left', ($(window).width() - this.width()) / 2  + 'px');
    $('.backpopup').fadeIn();
};

$(document).ready(function () {
    var el = document.getElementById('submit-massage');
    $('#shoutbox-comment').click(function(t){
        $(this).on('keyup', function (ev) {
            var keycode = ev.keyCode;
            if (keycode == '13') {
                var text = $('#shoutbox-comment').val();
                if (text.length > 0 && text.length < 100) {
                    var userId = document.getElementById("userId").value;
                    var mass = document.getElementById("ma");
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "sendMassage", false);
                    xhr.onreadystatechange = function () {
                         if (xhr.readyState == 4 && xhr.status == 200) {
                             if (xhr.responseText) {
                                 var li = document.createElement('li');
                                 li.className = "massage";
                                 li.innerHTML = text;
                                 mass.appendChild(li);
                                 document.getElementById("shoutbox-comment").value = "";
                             }
                         }
                    };
                    var data = {
                        'message':text,
                        'id':userId
                    };
                    data = JSON.stringify(data);
                    xhr.setRequestHeader('Content-type', 'application/json');
                    if (xhr.send(data)) {
                        alert("Сообщение отправлено! Оповещение выслано владельцу фото :)");
                    }
                } else {
                    alert("Сообщение не может быть пустым, или быть длинее 240 символов");
                }
            }
        });
    });
    if (el) {
        document.getElementById('submit-massage').addEventListener('click', function () {
            var text = document.getElementById('shoutbox-comment').value;
            if (text.length > 0 && text.length < 100) {
                var userId = document.getElementById("userId").value;
                var mass = document.getElementById("ma");
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "sendMassage", false);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText) {
                            var li = document.createElement('li');
                            li.className = "massage";
                            li.innerHTML = text;
                            mass.appendChild(li);
                            document.getElementById("shoutbox-comment").value = "";
                        }
                    }
                };
                var data = {
                    'message':text,
                    'id':userId
                };
                data = JSON.stringify(data);
                xhr.setRequestHeader('Content-type', 'application/json');
            if (xhr.send(data)) {
                    alert("Сообщение отправлено! Оповещение выслано владельцу фото :)");
                }
            } else {
                alert("Сообщение не может быть пустым, или быть длинее 240 символов");
            }
        });
    }
});


$(document).ready(function () {
    var el = document.getElementById('open');
    if (el) {
        el.addEventListener('click', function () {
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
        });
    }
});

$(document).ready(function () {
    $('.sm').click(function(m) {
        var text = document.getElementById("shoutbox-comment").value;
        var res = document.getElementById("shoutbox-comment").value = text + m.target.text;
        var tmp = res.match();
    });

    $('#newMassege').click(function(e) {
        var chatid = e.target.alt;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "newMassegeChat", false);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText) {
                    var comment = new Object();
                    comment = JSON.parse(xhr.responseText);
                    console.log(comment);
                }
            }
        };
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('chatid=' + chatid);
        console.log(chatid);
    });
});
