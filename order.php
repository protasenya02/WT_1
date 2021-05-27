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
    <title>Sweet life - оформить заказ</title>
</head>
<body>
<?php getHeader(); ?>
<section class="order">
   <div class="container">
      <div class="order_inner">
           <div class="order_head">
              <h1 class="order_title">Оставьте заявку</h1>
              <p class="order_subtitle">Мы с вами свяжемся для оформления заказа!</p> 
          </div>
          <form class="order_form" method="post">
              <div class="form_inner">
               <input type="text" name="name" placeholder="Ваше имя" value="<?php if (isset($_POST['send'])) { echo $_POST['name'];}?>" required>
               <input type="email" name="email" placeholder="E-mail адрес" value="<?php if (isset($_POST['send'])) { echo $_POST['email'];}?>" required>
                <input type="tel" name="tel"  placeholder="Телефон" <?php if (isset($_POST['send'])) { echo $_POST['tel'];}?> required>
                <textarea name="comment" cols="40" rows="3" placeholder="Комментарий"></textarea>
                  <div class="captcha_section">
                      <img class="captcha" src="captcha.php">
                      <input type="text" name="captcha" placeholder="Код с картинки" required id="captcha" autocomplete="off" value="">
                  </div>
                  <?php sendEmail(); ?>
                <input type="submit" name="send" value="Отправить">
             </div>
          </form>
      </div>
   </div>
</section>
<?php getFooter(); ?>

</body>
