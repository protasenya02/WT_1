<?php
session_start();
require_once('process_site.php');
require_once('statistics.php');
?>
<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "utf-8" name="description" content="Кондитерские изделия для жизни со вкусом" name="keywords" content="Кондитерская, кондитерские изделия, торты, печенье, конфеты, пирожные">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel = "stylesheet" href = "css/style.css">
    <link rel = "stylesheet" href = "css/_header.css">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Open+Sans:wght@300;400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/88d7dcb7cd.js" crossorigin="anonymous"></script>
    <title>Sweet life - контакты</title>
</head>
<body>
<?php getHeader(); ?>
<contacts class="contacts">
   <div class="container">
      <div class="contacts_inner">
         <div class="contacts_header">
            <h1 class="contacts_title">Контакты</h1>
            <p class="contacts_text">Остались вопросы? Свяжитесь с нами, чтобы получить более полную информацию</p>
         </div>
          <div class="contacts_map">
              <div id="map" style="width:100%;height:400px;"> </div>
                  <script>
                      function myMap() {
                          const adr =  { lat: 53.901482630756114, lng: 27.557455312216398 };
                          let mapCanvas = document.getElementById("map");
                          let mapOptions = {
                              center: new google.maps.LatLng(adr),
                              zoom: 14
                          };
                          let map = new google.maps.Map(
                              mapCanvas,
                              mapOptions);

                          const marker = new google.maps.Marker({
                              position: adr,
                              map: map,
                          });
                      }
                  </script>

               <div class="map_title">
                      <div class="map_text">
                         <i class="fas fa-map-marker-alt"></i>
                         <p class="icon_text">г.Минск, ул.Ленина,6</p>
                      </div>
                      <div class="map_text">
                          <i class="fas fa-phone-alt"></i>
                         <p class="icon_text">+375296634203</p>
                      </div>
                       <div class="map_text">
                         <i class="fas fa-envelope"></i>
                         <p class="icon_text">sweetlife@gmail.com</p>
                       </div>
               </div>
          </div>
      </div>
   </div>
</contacts>
<?php getFooter(); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA50qDe5oCLK1yYnR3iYtIuSnugKd8pYRI&callback=myMap" async defer></script>
</body>

