$(document).ready(function(){	//при загрузке страницы:
    $('.open').click(function(){
        // alert(1);//событие клик на нашу ссылку
        $('.popup-window').popup();	//запускаем функцию на наш блок с формой
    });
    $('.backpopup,.close').click(function(){ //событие клик на тень и крестик - закрываем окно и тень:
        $('.popup-window').fadeOut();
        $('.backpopup').fadeOut();
    });



    document.getElementById('open').addEventListener('click',function (e) {

        var idUser =  document.getElementById('open').getAttribute('data-id');

        var response = $.ajax({
            url:"messenger/isGroup",
            data:{user_id:idUser},
            contentType:"application/json"
        });

        console.log(response);

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

function qqqAjax(url, method, data) {
    var request = new XMLHttpRequest();

    var response;
    request.onreadystatechange = function () {
        if (request.readyState == '4' && request.status == '200'){
            response = JSON.parse(request.responseText);
            // return response;
        };
    };

    let dataJson = JSON.stringify(data);

    if (method === 1)
        request.open('POST', url, false);
    if (method === 2)
        request.open('GET', url, false);
    // request.setRequestHeader('Content-type', 'application/json');
    request.send(dataJson);

    return response;
}

document.getElementById('submit-massage').addEventListener('click', function (e) {
    // alert("fdfd");

    var idGr;
    var idUser =  document.getElementById('open').getAttribute('data-id');

    var response = $.ajax({
        url:"messenger/isGroup",
        data:{user_id:idUser},
        contentType:"application/json",
        success:function (e,idGr) {
            var text = document.getElementById('shoutbox-comment').value;
            if (text.trim(e).length < 1)
                return ;
            isNowGroup = e;

            var data = {
                "gr_id":isNowGroup,
                'text':text
            };

            var response = qqqAjax('messenger/createNewMessage',1,data);

            if (response['status'] == 1){
                var listMessages = qqqAjax('messenger/getListMessages?gr_id='+isNowGroup,2);
//         if (listMessages['status'] == 1){
//             var messages = document.getElementById('messages');
//             var i = 0;
//             messages.innerHTML = "";
// //             while (listMessages['record'][i]){
// //                 // console.log(response['record'][i]);
// //                 var li = document.createElement('li');
// // //                             li.className = "massage";
// // //                             li.innerHTML = text;
// // //                             mass.appendChild(li);
// // //                                  document.getElementById("shoutbox-comment").value = "";
// //                 var div = document.createElement('div');
// //                 div.setAttribute('class', 'item-message');
// //                 div.innerHTML = " <p><strong>"+listMessages['record'][i]['user_name']
// //                     +"</strong> "+listMessages['record'][i]['m_created_at']+"</p>\n" +
// //                     "                        <span>"+listMessages['record'][i]['m_text']+"</span>"
// //                 messages.append(div)
// //                 i++;
// //             }
//             document.getElementById('text').value = "";
//
//         }
            }
        }
    });

    // idGr = response;

    // console.log(idGr);
    //
    // if (text.trim(e).length < 1)
    //     return ;
    // //
    // // if (isNowGroup == 0){
    // //     var listGroup = document.getElementById('list-group');
    // //     idGr = listGroup.firstChild.nextSibling.id;
    //     isNowGroup = idGr;
    //     // console.log();
    // // }
    // // console.log(isNowGroup);
    // var data = {
    //     "gr_id":isNowGroup,
    //     'text':text
    // };

//     response = qqqAjax('messenger/createNewMessage',1,data);
//
//     if (response['status'] == 1){
//         var listMessages = qqqAjax('messenger/getListMessages?gr_id='+isNowGroup,2);
// //         if (listMessages['status'] == 1){
// //             var messages = document.getElementById('messages');
// //             var i = 0;
// //             messages.innerHTML = "";
// // //             while (listMessages['record'][i]){
// // //                 // console.log(response['record'][i]);
// // //                 var li = document.createElement('li');
// // // //                             li.className = "massage";
// // // //                             li.innerHTML = text;
// // // //                             mass.appendChild(li);
// // // //                                  document.getElementById("shoutbox-comment").value = "";
// // //                 var div = document.createElement('div');
// // //                 div.setAttribute('class', 'item-message');
// // //                 div.innerHTML = " <p><strong>"+listMessages['record'][i]['user_name']
// // //                     +"</strong> "+listMessages['record'][i]['m_created_at']+"</p>\n" +
// // //                     "                        <span>"+listMessages['record'][i]['m_text']+"</span>"
// // //                 messages.append(div)
// // //                 i++;
// // //             }
// //             document.getElementById('text').value = "";
// //
// //         }
//     }

})




//
//
//
//
// $(document).ready(function () {
//     var el = document.getElementById('submit-massage');
//     $('#shoutbox-comment').click(function(t){
//         $(this).keypress(function (ev) {
//             var keycode = (ev.keyCode ? ev.keyCode : ev.which);
//             if (keycode == '13') {
//                 var text = document.getElementById("shoutbox-comment").value;
//                 if (text.length > 0 && text.length < 100) {
//                     var userId = document.getElementById("userId").value;
//                     var mass = document.getElementById("ma");
//                     var xhr = new XMLHttpRequest();
//                     xhr.open("POST", "sendMassage", false);
//                     xhr.onreadystatechange = function () {
//                          if (xhr.readyState == 4 && xhr.status == 200) {
//                              if (xhr.responseText) {
//                             // console.log(xhr.responseText);
//
//                             var li = document.createElement('li');
//                             li.className = "massage";
//                             li.innerHTML = text;
//                             mass.appendChild(li);
//                                  document.getElementById("shoutbox-comment").value = "";
//                         }
//                     }
//                 }
//                             xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//                 if (xhr.send('massage=' + JSON.stringify(text) + '&id=' + userId)) {
//                     alert("Сообщение отправлено! Оповещение выслано владельцу фото :)");
//                 }
//             }
//                 else{
//                     alert("Сообщение не может быть пустым, или быть длинее 240 символов")
//                 }
//             }
//
//         });
//
//     });
//     if (el) {
//         document.getElementById('submit-massage').addEventListener('click', function () {
//             // console.log("dfddfd");
//
//             var text = document.getElementById('shoutbox-comment').value;
//             if (text.length > 0 && text.length < 100) {
//                 var userId = document.getElementById("userId").value;
//                 var mass = document.getElementById("ma");
//                 var xhr = new XMLHttpRequest();
//                 xhr.open("POST", "sendMassage", false);
//                 xhr.onreadystatechange = function () {
//                     if (xhr.readyState == 4 && xhr.status == 200) {
//                         if (xhr.responseText) {
//                             // console.log(xhr.responseText);
//
//                             var li = document.createElement('li');
//                             li.className = "massage";
//                             li.innerHTML = text;
//                             mass.appendChild(li);
//                             document.getElementById("shoutbox-comment").value = "";
//                         }
//                     }
//                 }
//                 var data = {
//                     'message':text,
//                     'id':userId
//                 };
//                 data = JSON.stringify(data);
//                 xhr.setRequestHeader('Content-type', 'application/json');
//                 // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//                 // if (xhr.send('massage=' + JSON.stringify(text) + '&id=' + userId)) {
//                 //     alert("Сообщение отправлено! Оповещение выслано владельцу фото :)");
//                 // }
//             if (xhr.send(data)) {
//                     alert("Сообщение отправлено! Оповещение выслано владельцу фото :)");
//                 }
//             }
//             else{
//                 alert("Сообщение не может быть пустым, или быть длинее 240 символов")
//             }
//
//         });
//     }
//
// });
//
//     $(document).ready(function () {
//
//
//         var el = document.getElementById('open');
//         if (el) {
//             el.addEventListener('click', function () {
//
//                 var massegeReload = document.getElementById("ma");
//                 var userId = document.getElementById("userId").value;
//                 var sesionId = document.getElementById("sesionId").value;
//
//                 setInterval(function () {
//
//                     var xhr = new XMLHttpRequest();
//                     xhr.open("POST", "reloadMassage", true);
//                     xhr.onreadystatechange = function () {
//                         if (xhr.readyState == 4 && xhr.status == 200) {
//                             if (xhr.responseText) {
//                                 var comment = new Object();
//                                 comment = JSON.parse(xhr.responseText);
//
//                                 $('.massage').remove();
//                                 $('.massage2').remove();
//                                 $('.date').remove();
//
//                                 for (i = 0; i < comment.length; i++) {
//                                     var li = document.createElement('li');
//
//                                     if (i == 0){
//                                         var li3 = document.createElement('li');
//                                         li3.className = "date";
//                                         li3.innerHTML = comment[0]['date'];
//                                         massegeReload.appendChild(li3);
//                                     }
//                                     var cla;
//                                     if (i > 0 ) {
//                                         if (comment[i]['date'] != comment[i - 1]['date']) {
//                                             var li2 = document.createElement('li');
//                                             li2.className = "date";
//                                             li2.innerHTML = comment[i]['date'];
//                                             massegeReload.appendChild(li2);
//                                         }
//                                     }
//                                     if(comment[i]['user_id'] == sesionId){
//                                         if (comment[i]['status'] == 0)
//                                         {
//                                             cla = 'class="unread"';
//
//                                         }
//                                         else {
//                                             cla = 'class="chatIm"';
//                                         }
//                                         li.className = "massage2";
//
//                                         li.innerHTML = '<span ' + cla + '>' + comment[i]['text'] + '</span>   ' + '<span class="time" >' + comment[i]['time'] + '</span>';
//                                     }
//                                     else {
//                                         li.className = "massage";
//                                         li.innerHTML = '<span class="time" >' + comment[i]['time'] + '</span>' + '   ' + '<span class="chat_u" >' + comment[i]['text'] + '</span>';
//                                     }
//                                     massegeReload.appendChild(li);
//                                 }
//
//                             }
//                         }
//                     }
//                     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//                     xhr.send('id=' + userId);
//                 }, 1000);
//             });
//         }
//     });
//
// $(document).ready(function () {
//
//     $('.sm').click(function(m){
//         var text = document.getElementById("shoutbox-comment").value;
//         var res = document.getElementById("shoutbox-comment").value = text + m.target.text;
//         var tmp = res.match();
//     });
//
//     $('#newMassege').click(function(e){
//         var chatid = e.target.alt;
//         var xhr = new XMLHttpRequest();
//         xhr.open("POST", "newMassegeChat", false);
//         xhr.onreadystatechange = function () {
//             if (xhr.readyState == 4 && xhr.status == 200) {
//                 if (xhr.responseText) {
//                     var comment = new Object();
//                     comment = JSON.parse(xhr.responseText);
//                     console.log(comment);
//                 }
//             }
//         }
//         xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//         xhr.send('chatid=' + chatid);
//         console.log(chatid);
//     });
//
// });
//
//
//