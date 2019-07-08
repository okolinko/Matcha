window.onload = function() {

    $('.cord').click(function(t){
        alert("Введите координаты в формате lat = xx.xxxx, lon = xx.xxxx")
        $(this).keypress(function (ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var text = document.getElementsByClassName("cord")[0];
                var val = text.value.split(',');
                var lat = val[0].split('=');
                var latitude = lat[1].replace(/\s+/g,' ').trim();
                var lon = val[1].split('=');
                var longitude = lon[1].replace(/\s+/g,' ').trim();
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
        })
    });

    $('.btn1').click(function(e){
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

                    // alert('Error.code: '+e.code+' Error.message: '+e.message);
                    alert("Дурацкая мозила!");
                }
            );

        }else {
            alert("Ваш браузер НЕ підтримує геолокацію.");
        }
    });

};

// $.getJSON("https://ip-api.io/json/",
//     function(result) {
//         console.log(result);
//     });
// window.onload = function() {

    // $.getJSON("https://ip-api.io/json/",
    //     function(result) {
    //         $.ajax({
    //             type:'POST',
    //             url: "/geolocation",
    //             data: result,
    //         });
    //     });



    // $.ajax({
    //     type: "GET",
    //     dataType: "json",
    //     url: 'https://ip-api.io/json',
    //     success: function(data) {
    //         console.log(
    //             'Your ip address is ' + data.ip
    //             + ' city: ' + data.city
    //             + ' region: ' + data.region_name
    //             + ' country: ' + data.country_name
    //         );
    //
    //     }
    // });
// };
