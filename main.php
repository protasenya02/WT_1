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
    <link rel = "stylesheet" href = "css/_main.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Open+Sans:wght@300;400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/88d7dcb7cd.js" crossorigin="anonymous"></script>

    <title>Sweet life</title>
</head>
<body>
<?php getHeader(); ?>
<section class="intro">
    <div class="container">
      <div class="intro_inner">
               <h3 class="intro_suptitle">кондитерская</h3>
               <h1 class="intro_title"><span lang="en">Sweet life</span></h1>
               <h4 class="intro_subtitle">Кондитерские изделия для жизни со вкусом</h4>
     
              <a class="btn" href="order.php">заказать</a>
      </div>    
    </div>
</section>
 <section class="main_section">
    <div class="container">
        <div class="section_inner">
             <img class="section_image" src="assets/images/main/section-1.webp" alt="Пирожные">

             <div class="section_header">
               <h1 class="section_title">вручную</h1>
               <h2 class="section_subtitle">по собственным рецептам</h2>
                 <div class="section_inner_text">
                    <p><span lang="en">Sweet life</span>— больше, чем кондитерская. Мы приготовим вам вкусные и красивые сладости  из натуральных ингредиентов. Ручная работа с заботой и любовью!</p>
                  </div> 
            </div>
        </div>
    </div>
 </section>
 <section class="proc_section">
     <div class="container">
         <h1 class="proc_header">Наши неизменные принципы</h1>
         <div class="principles">
               <div class="proc">
                <h1 class="proc_number">1</h1>
                <p class="proc_text">Ручной способ приготовления булочек, пирожных, печенья и тортов.</p>
                </div>
                
                <div class="proc">
                 <h1 class="proc_number">2</h1>
                <p class="proc_text">Только свежие и натуральные продукты. Никаких улучшителей, красителей и консервантов!</p>
                </div>
                
                <div class="proc">  
                 <h1 class="proc_number">3</h1>
                <p class="proc_text">Команда профессиональных кондитеров, искренне любящих свое «дело».</p>
                </div>
         </div>
     </div>
 </section>
 <section class="main_section">
         <div class="container">
             <div class="section_inner">
              <img class="inner_image" src="assets/images/main/section-2.webp" alt="Пирожные">
           
             <div class="inner_text">
               <p class="section_inner_text"> Мы уделяем особое внимание качеству всех ингредиентов, используемых для приготовления своей продукции.</p>
               <p class="section_inner_text">В основу нашего бизнеса заложено бережное отношение к продуктам. Именно поэтому все изделия в наших пекарнях изготавливаются вручную, с особой теплотой наших сотрудников.</p>
               <p class="section_inner_text">Наша команда – это профессиональные кондитеры и пекари, выбранные для работы над вашим заказом.</p>
                
            </div>
            </div>
        </div>
</section>
<?php getFooter(); ?>
</body>
</html>


