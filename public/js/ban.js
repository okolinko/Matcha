$(document).ready(function () {
   var current_url = window.location.protocol + "//" + window.location.host;
   if ($("#ban")) {
       addEventListener('click', function (event) {
<<<<<<< HEAD
           if (event.toElement.src == current_url + "/public/img/ban.png"){
               event.toElement.src = current_url + "/public/img/ban_n.png";
=======
           if (event.toElement.src == "http://matcha.loc/public/img/ban.png"){
               event.toElement.src = "http://matcha.loc/public/img/ban_n.png";
>>>>>>> 601a54124ae4e557cfa5d5ab57bd012ec356b0c8
              var id_user = (event.toElement.attributes.value.value);
               // alert(id_user);
               $.post(current_url + "/userbandell", {
                   idUser: id_user
                   },);
           }
<<<<<<< HEAD
           else if (event.toElement.src == current_url + "/public/img/ban_n.png"){
               event.toElement.src = current_url + "/public/img/ban.png";
=======
           else if (event.toElement.src == "http://matcha.loc/public/img/ban_n.png"){
               event.toElement.src = "http://matcha.loc/public/img/ban.png";
>>>>>>> 601a54124ae4e557cfa5d5ab57bd012ec356b0c8
               var id_user = (event.toElement.attributes.value.value);
               // alert(id_user);
               $.post(current_url + "/userbanadd", {
                   idUser: id_user
               },);
           }
       });
   }
});
