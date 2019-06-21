$(document).ready(function(){	//при загрузке страницы:
    $('.open').click(function(){	//событие клик на нашу ссылку
        $('.popup-window').popup();	//запускаем функцию на наш блок с формой
    });
    $('.backpopup,.close').click(function(){ //событие клик на тень и крестик - закрываем окно и тень:
        $('.popup-window').fadeOut();
        $('.backpopup').fadeOut();
    });
});

$.fn.popup = function() { 	//функция для открытия всплывающего окна:
    this.css('position', 'absolute').fadeIn();	//задаем абсолютное позиционирование и эффект открытия
    //махинации с положением сверху:учитывается высота самого блока, экрана и позиции на странице:
    this.css('top', ($(window).height() - this.height()) / 2 + $(window).scrollTop() + 'px');
    //слева задается отступ, учитывается ширина самого блока и половина ширины экрана
    this.css('left', ($(window).width() - this.width()) / 2  + 'px');
    //открываем тень с эффектом:
    $('.backpopup').fadeIn();



}


$(document).ready(function () {
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
                        // console.log(xhr.responseText);

                        var li = document.createElement('li');
                        li.className = "massage";
                        li.innerHTML = text;
                        mass.appendChild(li);
                    }
                }
            }
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            if (xhr.send('massage=' + JSON.stringify(text) + '&id=' + userId)) {
                alert("Коментарий оставлен! Оповещение выслано владельцу фото :)");
            }
        }
        else{
            alert("Коментарий не может быть пустым, или быть длинее 240 символов")
        }

    });
});
    $(document).ready(function () {
        var el = document.getElementById('open');
        if (el) {
            el.addEventListener('click', function () {
                var massegeReload = document.getElementById("ma");
                var userId = document.getElementById("userId").value;
                var sesionId = document.getElementById("sesionId").value;
                var now = new Date();
                var year = now.getFullYear();
                var month = now.getMonth() + 1;
                var day = now.getDate();

                setInterval(function () {
                    var massegeReload = document.getElementById("ma");
                    var userId = document.getElementById("userId").value;
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "reloadMassage", true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            if (xhr.responseText) {
                                var comment = new Object();
                                comment = JSON.parse(xhr.responseText);
                                var str =  comment[1]['date'];
                                var date = str.split('-',3);
                                // console.log(date[1]);

                                $('.massage').remove();
                                $('.massage2').remove();
                                for (i = 0; i < comment.length; i++) {
                                    var li = document.createElement('li');
                                    if(comment[i]['user_id'] == sesionId){
                                        li.className = "massage2";
                                        li.innerHTML = comment[i]['text'] + '   ' + '<span class="time">' + comment[i]['time'] + '</span>';
                                    }
                                    else {
                                        li.className = "massage";
                                        li.innerHTML = '<span class="time">' + comment[i]['time'] + '</span>' + '   ' + comment[i]['text'];
                                    }
                                    massegeReload.appendChild(li);
                                }

                            }
                        }
                    }
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
                    xhr.send('id=' + userId);
                }, 500);
            });
        }
    });





