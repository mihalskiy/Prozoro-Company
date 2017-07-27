<?php
//include_once 'config.php';
// session_start();

// // old link
// //$CONNECT = mysqli_connect(HOST, USER, PASS, DB);

// $db_conf = array( 	
// 					"type" 		=> PHPGRID_DBTYPE, 
// 					"server" 	=> PHPGRID_DBHOST,
// 					"user" 		=> PHPGRID_DBUSER,
// 					"password" 	=> PHPGRID_DBPASS,
// 					"database" 	=> PHPGRID_DBNAME
// );



// // проверка соиденение
// //if ($CONNECT) echo 'Поключение к БД Успешно ';
// //else echo 'ERROR НЕт ПОКЛЮЧЕНИЯ К БД';



// // передаем адрес для загрузки и если страница пустая

// if ($_SERVER['REQUEST_URI'] == '/') {
// $Page = 'index';
// $Module = 'index';
// } else {
// $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $URL_Parts = explode('/', trim($URL_Path, ' /'));
// $Page = array_shift($URL_Parts);
// $Module = array_shift($URL_Parts);


// if (!empty($Module)) {
// $Param = array();
// for ($i = 0; $i < count($URL_Parts); $i++) {
// $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
// }
// }
// }

// подключение файлов

// if ($Page == 'index' and $Module == 'index') include('page/welcome.php');
// else if ($Page == 'calendar') echo include('page/secretary.php');
// else if ($Page == 'graphics') echo 'Графіки';
// else if ($Page == 'register') /*echo 'Реєстрація'*/ include('page/register.php');
// else if ($Page == 'login') include('page/login.php');

// else if ($Page == 'account')  include('forms/account.php');


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
    echo '';
}

// вставка меню
function Menu() {
    echo '';
}




?>

