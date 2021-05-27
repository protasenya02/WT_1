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
    
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Open+Sans:wght@300;400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/88d7dcb7cd.js" crossorigin="anonymous"></script>
    <title>Sweet life - меню</title>
</head>
<body>
<?php
    getHeader();
    getMenu();
    getFooter();
?>
<script src="js/script.js"></script>
</body>

