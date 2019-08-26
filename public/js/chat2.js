
var isNowGroup = 0;
$(document).ready(function (e) {



   document.getElementById('list-group').addEventListener('click', function (e) {
       if (e.path.length === 7) {
           var idGr = e.path[0].id;
           isNowGroup = idGr;
           // console.log(isNowGroup);
           var response = qqqAjax('messenger/getListMessages?gr_id='+idGr,2);

           if (response['status'] == 1){
               var messages = document.getElementById('messages');
               var i = 0;
               messages.innerHTML = "";
               while (response['record'][i]){
                   // console.log(response['record'][i]);
                   var div = document.createElement('div');
                   div.setAttribute('class', 'item-message');
                   div.innerHTML = " <p><strong>"+response['record'][i]['user_name']
                       +"</strong> "+response['record'][i]['m_created_at']+"</p>\n" +
                       "                        <span>"+response['record'][i]['m_text']+"</span>"
                   messages.append(div)
                   i++;
               }
           }
       }
   });

   document.getElementById('sendqw').addEventListener('click', function (e) {
       // alert("fdfd");

       var text = document.getElementById('text').value;
       var idGr;

       if (text.trim(e).length < 1)
           return ;

       if (isNowGroup == 0){
           var listGroup = document.getElementById('list-group');
           idGr = listGroup.firstChild.nextSibling.id;
           isNowGroup = idGr;
           // console.log();
       }
       // console.log(isNowGroup);
       var data = {
           "gr_id":isNowGroup,
           'text':text
       };

       var response = qqqAjax('messenger/createNewMessage',1,data);

       if (response['status'] == 1){
           var listMessages = qqqAjax('messenger/getListMessages?gr_id='+isNowGroup,2);
           if (listMessages['status'] == 1){
               var messages = document.getElementById('messages');
               var i = 0;
               messages.innerHTML = "";
               while (listMessages['record'][i]){
                   // console.log(response['record'][i]);
                   var div = document.createElement('div');
                   div.setAttribute('class', 'item-message');
                   div.innerHTML = " <p><strong>"+listMessages['record'][i]['user_name']
                       +"</strong> "+listMessages['record'][i]['m_created_at']+"</p>\n" +
                       "                        <span>"+listMessages['record'][i]['m_text']+"</span>"
                   messages.append(div)
                   i++;
               }
               document.getElementById('text').value = "";

           }
       }

   })
});



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
    request.setRequestHeader('Content-type', 'application/json');
    request.send(dataJson);

    return response;
}

setInterval(function (e) {
    if (isNowGroup == 0) {
        var listGroup = document.getElementById('list-group');
        idGr = listGroup.firstChild.nextSibling.id;
        isNowGroup = idGr;
    }
        var listMessages = qqqAjax('messenger/getListMessages?gr_id='+isNowGroup,2);
        if (listMessages['status'] == 1){
            var messages = document.getElementById('messages');
            var i = 0;
            messages.innerHTML = "";
            while (listMessages['record'][i]){
                // console.log(response['record'][i]);
                var div = document.createElement('div');
                div.setAttribute('class', 'item-message');
                div.innerHTML = " <p><strong>"+listMessages['record'][i]['user_name']
                    +"</strong> "+listMessages['record'][i]['m_created_at']+"</p>\n" +
                    "                        <span>"+listMessages['record'][i]['m_text']+"</span>"
                messages.append(div)
                i++;
            }
            // document.getElementById('text').value = "";

        }
}, 1000);



// setInterval(function (e) {
//     var response = qqqAjax('messenger/createNewMessage',1,{'gr_id':6,'text':'Hello'})
//     if (response['status'] && response['record'] != 0){
//         var msg = document.getElementById('msg');
//         msg.innerHTML = "Сообщения <span style='color: red'>*</span>";
//         // console.log(msg)
//     }
//     // console.log(response)
// },1000,this);