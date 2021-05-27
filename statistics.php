<?php
session_start();
require_once("constants.php");

function connectBD($query)
{
    // подключение к базе данных
    $mysqli = @new mysqli(HOST, USER, PASS, DB);
    // проверка соединения
    if ($mysqli->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        exit();
    }
    // установка кодировки
    $mysqli->set_charset('utf8');

    // запрос к БД
    $result = $mysqli->query($query);

    // закрытие соединения
    $mysqli->close();

    // возврат объекта mysqli_result.
    return $result;
}

function getBrowser()
{
    // получение данных которые браузер отпотправляет на сервер для самоиндентификации
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser_name = 'Unknown';

    if(preg_match('/MSIE/i',$user_agent) && !preg_match('/Opera/i',$user_agent))
    {
        $browser_name = 'Internet Explorer';
    }
    elseif(preg_match('/Firefox/i',$user_agent))
    {
        $browser_name = 'Mozilla Firefox';
    }
    elseif(preg_match('/Chrome/i',$user_agent))
    {
        $browser_name = 'Google Chrome';
    }
    elseif(preg_match('/Safari/i',$user_agent))
    {
        $browser_name = 'Safari';
    }
    elseif(preg_match('/Opera/i',$user_agent))
    {
        $browser_name = 'Opera';
    }
    elseif(preg_match('/Brave/i',$user_agent))
    {
        $browser_name = 'Brave';
    }

    return  $browser_name;
}

function updateBrowserTable()
{
    $browser_name = getBrowser();

    if ( !isset($_COOKIE['browser'])) {
        setcookie("browser", getBrowser(), time()+ 3600);

        $_COOKIE['browser'] = $browser_name;
        $query = "UPDATE `browsers`
                  SET `view_counter` = `view_counter` + 1
                  WHERE `name` = '$browser_name'";

        connectBD($query);
    }
}

function getOS() {

    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $os_platform  = "Unknown OS Platform";

    $os_array     = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function updateOSTable()
{
    $os_name = getOS();

    if ( !isset($_COOKIE['os'])) {
        setcookie("os", getBrowser(), time()+ 3600);

        $_COOKIE['os'] = $os_name;
        $query = "UPDATE `operating system`
                  SET `counter` = `counter` + 1
                  WHERE `name` = '$os_name'";

        connectBD($query);
    }
}

function updateVisitTime()
{
    $now = new DateTime();

    if ( !isset($_COOKIE['visit_time'])) {
        setcookie("visit_time", $now->getTimestamp(), time() + 3600);
        $query = "INSERT INTO `visit time` (`id`, `time`) VALUES (NULL, CURRENT_TIMESTAMP)";
        connectBD($query);
    }
}

function updatePageView() {

    // получение текущеей страницы
    $uri = $_SERVER['REQUEST_URI'];

    $page_name =  preg_replace('/\/WT\/WT_1\//i',"", $uri);
    $query = "UPDATE `page_views`
                  SET `counter` = `counter` + 1
                  WHERE `name` = '$page_name'";

    connectBD($query);
}

updateBrowserTable();
updateOSTable();
updateVisitTime();
updatePageView();