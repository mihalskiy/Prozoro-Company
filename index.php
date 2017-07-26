<?php
include_once 'setting.php';
session_start();
$CONNECT = mysqli_connect(HOST, USERS, PASS, DB);

// проверка соиденение
//if ($CONNECT) echo 'Поключение к БД Успешно ';
//else echo 'ERROR НЕт ПОКЛЮЧЕНИЯ К БД';



// передаем адрес для загрузки и если страница пустая

if ($_SERVER['REQUEST_URI'] == '/') {
$Page = 'index';
$Module = 'index';
} else {
$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL_Parts = explode('/', trim($URL_Path, ' /'));
$Page = array_shift($URL_Parts);
$Module = array_shift($URL_Parts);


if (!empty($Module)) {
$Param = array();
for ($i = 0; $i < count($URL_Parts); $i++) {
$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
}
}
}

// подключение файлов

if ($Page == 'index' and $Module == 'index') include('page/index.php');
else if ($Page == 'calendar') echo 'Календарь';
else if ($Page == 'graphics') echo 'Графіки';
else if ($Page == 'register') /*echo 'Реєстрація'*/ include('page/register.php');
else if ($Page == 'login') /*echo 'Реєстрація'*/ include('page/login.php');


// вставка header на страници
function Head($p1) {
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><title>'.$p1.'</title><link rel="shortcut icon" href="resource/img/logo.ico" type="image/x-icon"><link href="resource/css/bootstrap.min.css" rel="stylesheet" type="text/css"><script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><link href="resource/css/style.css" type="text/css" rel="stylesheet"></head>';
}
?>