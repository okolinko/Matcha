$(document).ready(function () {
    var userId = $('.avat').length;
    console.log(userId);
    setInterval(function () {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "checkNewMassege", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                if (xhr.responseText) {
                    ;
                }
            }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('id=' + userId);
    }, 5000);
});
