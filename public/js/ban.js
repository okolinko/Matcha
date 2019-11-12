$(document).ready(function () {
   if ($("#ban")) {
       addEventListener('click', function (event) {
           if (event.toElement.src == "https://matcha.loc/public/img/ban.png"){
               event.toElement.src = "https://matcha.loc/public/img/ban_n.png";
              var id_user = (event.toElement.attributes.value.value);
               // alert(id_user);
               $.post("//matcha.loc/userbandell", {
                   idUser: id_user
                   },);
           }
           else if (event.toElement.src == "https://matcha.loc/public/img/ban_n.png"){
               event.toElement.src = "https://matcha.loc/public/img/ban.png";
               var id_user = (event.toElement.attributes.value.value);
               // alert(id_user);
               $.post("//matcha.loc/userbanadd", {
                   idUser: id_user
               },);
           }
       });
   }
});