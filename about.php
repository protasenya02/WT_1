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
    <title>Sweet life - о нас</title>
</head>
<body>
<?php getHeader(); ?>
<about_us class="about_us">
    <div class="container">
        <div class="about_inner">
           <div class="inner_text">
                <h1 class="about_title">О нас</h1>
                <p class="about_text">Sweet life — проект европейской кондитерской, в котором качество, свежесть и красота продукции ценится превыше всего. Основана кондитерская в начале 2011 года профессиональным кондитером.</p>
            </div>
        
            <img class="about_image"src="assets/images/about/about-1.webp"alt="Шоколад">
        </div>    
    </div>  
</about_us>
<?php getBenefits(); ?>
<section class="section">
   <div class="container">
       <div class="section_inner">
           <div class="section_item">
               <div class="section_image">
                 <a href="menu.php"><img src="assets/images/about/about-2.webp"alt="Вафли"></a>
               </div>
               <div class="href_text">Перейти к меню</div>
           </div>
            <div class="section_item">
              <div class="section_image">
                  <a href="order.php"><img src="assets/images/about/about-3.webp"alt="Пирожное" border="0"></a>
               </div>
                 <div class="href_text">Оставить зявку</div>
            </div>
       </div>
   </div>    
</section>
<?php getFooter(); ?>
</body>
