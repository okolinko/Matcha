window.onload = function() {
    function position(pos){
        var latitude = pos.coords.latitude;
        var longitude = pos.coords.longitude;
        var res;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "geolocation", false);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if ( xhr.responseText.indexOf("true") == -1)
                    res = false;
                else
                    res = true;
            }
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('location=' + (latitude+' '+longitude));
    }

    if(navigator.geolocation){

        navigator.geolocation.getCurrentPosition(position, function(e){

                alert('Error.code: '+e.code+' Error.message: '+e.message);

            }
        );

    }else {
        alert("Ваш браузер НЕ підтримує геолокацію.");
    }

};
// window.onload = function() {
//
//     // $(document).ready(function () {
//     //     $.ajax({
//     //         type: 'GET',
//     //         url: 'http://ip-api.io/json/',
//     //         dataType: 'jsonp',
//     //         success: function (data) {
//     //             console.log(data);
//     //         }
//     //     });
//     // })
//
//
//     $.getJSON("http://ip-api.io/json/",
//         function(result) {
//             console.log(result);
//         });
// };