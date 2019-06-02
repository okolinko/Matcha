<?php require('partials/head.php'); ?>
<h1>Поиск половинки</h1>
<!--<section id="wrapper">-->
<!--    <script type="text/javascript"-->
<!--            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBynQi-KXdjfKwH8OXU4lzvppVrFMRkEak">-->
<!--    </script>-->
<!--    <article>-->
<!--    </article>-->
<!--    <script>-->
<!--        function success(position) {-->
<!--            // var mapcanvas = document.createElement('div');-->
<!--            // mapcanvas.id = 'mapcontainer';-->
<!--            // mapcanvas.style.height = '400px';-->
<!--            // mapcanvas.style.width = '600px';-->
<!--            // document.querySelector('article').appendChild(mapcanvas);-->
<!--            // var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);-->
<!--            console.log(position.coords.latitude);-->
<!--            console.log(position.coords.longitude);-->
<!--            // var options = {-->
<!--            //     zoom: 15,-->
<!--            //     center: coords,-->
<!--            //     mapTypeControl: false,-->
<!--            //     navigationControlOptions: {-->
<!--            //         style: google.maps.NavigationControlStyle.SMALL-->
<!--            //     },-->
<!--            //     mapTypeId: google.maps.MapTypeId.ROADMAP-->
<!--            // };-->
<!--            // var map = new google.maps.Map(document.getElementById("mapcontainer"), options);-->
<!--            // var marker = new google.maps.Marker({-->
<!--            //     position: coords,-->
<!--            //     map: map,-->
<!--            //     title:"Вы здесь!"-->
<!--            // });-->
<!--        }-->
<!--        if (navigator.geolocation) {-->
<!--            navigator.geolocation.getCurrentPosition(success);-->
<!--        } else {-->
<!--            error('Геолокация не поддерживается');-->
<!--        }-->
<!--    </script>-->
<!--</section>-->




<!--<script>-->
<!--    window.onload = function() {-->
<!--        if(navigator.geolocation) {-->
<!--            navigator.geolocation.getCurrentPosition(function(position) {-->
<!--                var latitude = position.coords.latitude;-->
<!--                var longitude = position.coords.longitude;-->
<!--                // alert(latitude+' '+longitude);-->
<!--                var res;-->
<!--                var xhr = new XMLHttpRequest();-->
<!--                xhr.open("POST", "profile", false);-->
<!---->
<!--                xhr.onreadystatechange = function () {-->
<!--                    if (xhr.readyState == 4 && xhr.status == 200) {-->
<!--                        if ( xhr.responseText.indexOf("true") == -1)-->
<!--                            res = false;-->
<!--                        else-->
<!--                            res = true;-->
<!--                    }-->
<!--                }-->
<!--                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');-->
<!--                xhr.send('location=' + (latitude+' '+longitude));-->
<!--            });-->
<!---->
<!--        } else {-->
<!--            alert("Geolocation API не поддерживается в вашем браузере");-->
<!--        }-->
<!--    };-->
<!--</script>-->
<?php require('partials/footer.php'); ?>
