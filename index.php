<?php
include_once 'config.php';
session_start();

// old link
//$CONNECT = mysqli_connect(HOST, USER, PASS, DB);

$db_conf = array( 	
					"type" 		=> PHPGRID_DBTYPE, 
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
);



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
else if ($Page == 'calendar') echo include('page/secretary.php');
else if ($Page == 'graphics') echo 'Графіки';
else if ($Page == 'register') /*echo 'Реєстрація'*/ include('page/register.php');
else if ($Page == 'login') include('page/login.php');

else if ($Page == 'account')  include('forms/account.php');


// функция обработки форми

function FormChars ($p1) {
return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}

// шифровка пароля 
function GenPass ($p1, $p2) {
    return md5('MRRUSLAN'.md5('594'.$p1.'741').md5('910'.$p2.'531'));
}

// вставка header на страници
function Head($p1) {
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><title>'.$p1.'</title><link rel="shortcut icon" href="resource/img/logo.ico" type="image/x-icon"><link href="resource/css/bootstrap.min.css" rel="stylesheet" type="text/css"><script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><link href="resource/css/style.css" type="text/css" rel="stylesheet"></head>';
}

function Menu() {
    echo '<div class="navbar"><nav class="navbar navbar-inverse"><div class="container-fluid"><div class="navbar-header"><a class="navbar-brand" href="#"><img alt="Brand" src="resource/img/logo.png" width="115px" height="115px"></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><ul class="nav navbar-nav"><li class="active"><a href="#">Головна <span class="sr-only">(current)</span></a></li><li><a href="#">Календарь</a></li><li><a href="/secretary">Графіки робіт</a></li><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Учасники <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="#">Секретарь</a></li><li><a href="#">Бухгалтер</a></li><li><a href="#">Юрист</a></li><li role="separator" class="divider"></li><li><a href="#">Кошторисник</a></li><li role="separator" class="divider"></li><li><a href="#">Деректор</a></li></ul></li></ul><ul class="nav navbar-nav navbar-right"><li><a href="/register">Реєстрація</a></li><li><a href="/login">Війти в систему</a></li></ul></div></nav></div>';
}


?>

