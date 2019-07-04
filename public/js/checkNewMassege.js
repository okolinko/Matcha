$(document).ready(function () {

    var userId = $('.avat').length;
    // console.log(userId);

    setInterval(function () {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "checkNewMassege", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                if (xhr.responseText) {
                    var chat = new Object();
                    chat = JSON.parse(xhr.responseText);
                    // console.log(chat2);


                }
            }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('id=' + userId);
    }, 2000);


});
