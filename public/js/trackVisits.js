$(document).ready(function () {
    $('.form-help').on("click", function(e){

        // let id = e.target.hash.split('=');

        let id = $(this).find("a").attr("user_id");

        document.location.href = "/accauntUser?id="+id;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "trackvisits", false);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if ( xhr.responseText.indexOf("true") == -1){
                    res = false;
                }
                else
                {
                    res = true;
                }
            }
        }

        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('id=' + id);
    });
});
