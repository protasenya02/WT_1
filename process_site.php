<?php
session_start();
require_once ("constants.php");

function getFooter()
{
    // шаблонизатор
    $file = file_get_contents("./templates/footer.tpl"); // путь к шаблону

    // замена из БД
    $file = preg_replace("/({DB=\")([a-zA-z.\-0-9_]*)(\"})/u",
        "<?=LoadMenuItems($2)?>", $file);

    // подключение результирующего файла
    file_put_contents("result", $file);
    include "result";
    unlink("result");
}

function getHeader()
{
    // шаблонизатор
    $file = file_get_contents("./templates/header.tpl"); // путь к шаблону

    // замена из БД
    $file = preg_replace("/({DB=\")([a-zA-z.\-0-9_]*)(\"})/u",
        "<?=LoadMenuItems($2)?>", $file);

    // подключение результирующего файла
    file_put_contents("result", $file);
    include "result";
    unlink("result");
}

function LoadMenuItems($id)
{
    // подключение к базе данных
    $mysqli = @new mysqli(HOST, USER, PASS, DB);
    // проверка соединения
    if ($mysqli->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }

    // текс SQL запроса
    $query = "SELECT `name` FROM `menu` WHERE id = $id";
    // запрос к БД
    $result = $mysqli->query($query);
    // извлечение результуреющего массива
    $data = $result->fetch_assoc();

    // удаление выборки
    $result->free();
    // закрытие соединения
    $mysqli->close();

    return $data['name'];
}

function captcha_valid()
{
    if($_POST['captcha'] !== $_SESSION['captcha']){
        return FALSE;
    }
    return TRUE;
}

function sendEmail()
{

    $name = $_POST['name'];
    $from = $_POST['email'];
    $phone = $_POST['tel'];
    $message = $name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$from;

    $to_email = "sweet.sweet.life.life@mail.ru";
    $subject = "Заказ";
    $headers = '';
    $EOL = "\r\n";
    $boundary = "--".md5(uniqid(time()));

    // заголовки
    $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";
    $headers   .= "From: $from".$EOL;

    $multipart  = "--$boundary$EOL";
    $multipart .= "Content-Type: text/plain; charset=UTF-8$EOL";
    $multipart .= "Content-Transfer-Encoding: base64$EOL";
    $multipart .= $EOL;
    $multipart .= chunk_split(base64_encode($message));

    if (isset($_POST['send'])) {

        if (captcha_valid()){
            if(mail($to_email, $subject, $multipart, $headers)) {
                echo '<span class="form_answer" style="color: green">Письмо успешно отправлено!</span>';
            } else
                echo '<span class="form_answer" style="color: red">Ошибка отправки!</span>';
        } else {
            echo '<span class="form_answer" style="color: red">Код введен неверно!</span>';
        }
    }
}

function LoadBenefitsTitle($id)
{
    // подключение к базе данных
    $mysqli = @new mysqli(HOST, USER, PASS, DB);
    // проверка соединения
    if ($mysqli->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }

    // текс SQL запроса
    $query = "SELECT `title` FROM  `aboutus_benefits` WHERE id = $id";
    // запрос к БД
    $result = $mysqli->query($query);
    // извлечение результуреющего массива
    $data = $result->fetch_assoc();

    // удаление выборки
    $result->free();
    // закрытие соединения
    $mysqli->close();

    return $data['title'];
}

function LoadBenefitsText($id)
{
    // подключение к базе данных
    $mysqli = @new mysqli(HOST, USER, PASS, DB);
    // проверка соединения
    if ($mysqli->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }

    // текс SQL запроса
    $query = "SELECT `text` FROM  `aboutus_benefits` WHERE id = $id";
    // запрос к БД
    $result = $mysqli->query($query);
    // извлечение результуреющего массива
    $data = $result->fetch_assoc();

    // удаление выборки
    $result->free();
    // закрытие соединения
    $mysqli->close();

    return $data['text'];
}


function getBenefits()
{
    // шаблонизатор
    $file = file_get_contents("./templates/benefits.tpl"); // путь к шаблону

    // замена из БД
    $file = preg_replace("/({DB\/title=\")([a-zA-z.\-0-9_]*)(\"})/u",
        "<?=LoadBenefitsTitle($2)?>", $file);
    $file = preg_replace("/({DB\/text=\")([a-zA-z.\-0-9_]*)(\"})/u",
        "<?=LoadBenefitsText($2)?>", $file);

    // подключение результирующего файла
    file_put_contents("result", $file);
    include "result";
    unlink("result");
}

function LoadMenuName( $id)
{
    // подключение к базе данных
    $mysqli = @new mysqli(HOST, USER, PASS, DB);
    // проверка соединения
    if ($mysqli->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }

    // текс SQL запроса
    $query = "SELECT `product_name` FROM  `products` WHERE id = $id";
    // запрос к БД
    $result = $mysqli->query($query);
    // извлечение результуреющего массива
    $data = $result->fetch_assoc();

    // удаление выборки
    $result->free();
    // закрытие соединения
    $mysqli->close();

    return $data['product_name'];
}

function LoadMenuImage( $id)
{
    // подключение к базе данных
    $mysqli = @new mysqli(HOST, USER, PASS, DB);
    // проверка соединения
    if ($mysqli->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }

    // текс SQL запроса
    $query = "SELECT `product_image` FROM  `products` WHERE id = $id";
    // запрос к БД
    $result = $mysqli->query($query);
    // извлечение результуреющего массива
    $data = $result->fetch_assoc();

    // удаление выборки
    $result->free();
    // закрытие соединения
    $mysqli->close();

    return $data['product_image'];
}

function getMenu()
{
    // шаблонизатор
    $file = file_get_contents("./templates/menu.tpl"); // путь к шаблону

    // замена из БД
    $file = preg_replace("/({DB\/name=\")([a-zA-z.\-0-9_]*)(\"})/u",
        "<?=LoadMenuName($2)?>", $file);
    $file = preg_replace("/({DB\/image=\")([a-zA-z.\-0-9_]*)(\"})/u",
        "<?=LoadMenuImage($2)?>", $file);

    // подключение результирующего файла
    file_put_contents("result", $file);
    include "result";
    unlink("result");
}