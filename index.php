<?php
include_once 'config.php';
include_once 'setting.php';



session_start();

// old link
$CONNECT = mysqli_connect($host, $user, $password, $database);

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

if ($_SESSION['USER_LOGIN_IN'] != 1 and $_COOKIE['user']) {
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id`, `name`, `regdate`, `email`, `login`, , `group` `avatar` FROM `users` WHERE `password` = '$_COOKIE[user]'"));
// присваюем юзерам данние
$_SESSION['USER_ID'] = $Row['id'];
$_SESSION['USER_LOGIN'] = $Row['login'];
$_SESSION['USER_NAME'] = $Row['name'];
$_SESSION['USER_REGDATE'] = $Row['regdate'];
$_SESSION['USER_EMAIL'] = $Row['email'];
$_SESSION['USER_AVATAR'] = $Row['avatar'];
$_SESSION['USER_GROUP'] = $Row['group'];
$_SESSION['USER_LOGIN_IN'] = 1;
}


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



// Загрузка файлов
// if ($Page == 'loads') {
// 	if (!$Module or $Page == 'loads' and $Module == 'category' or $Page == 'loads' and $Module == 'main') include ('module/loads/main.php')
// 	else if ($Module == 'material') include 
// }

// подключение файлов
if ($Page == 'index' and $Module == 'index') include('page/index.php');

else if ($Page == 'register')  include('page/register.php');
else if ($Page == 'login') include('page/login.php');
else if ($Page == 'profile') include('page/profile.php');
else if ($Page == 'restore') include('page/restore.php');
else if ($Page == 'chat') include('page/chat.php');

else if ($Page == 'news') {
if (!$Module or $Page == 'news' and $Module == 'category' or $Page == 'news' and $Module == 'main') include('module/news/main.php');
	else if ($Module == 'material') include('module/news/material.php');
	else if ($Module == 'add') include('module/news/add.php');
	else if ($Module == 'edit') include('module/news/edit.php');
	else if ($Module == 'control') include('module/news/control.php');
}

else if ($Page == 'loads') {
if (!$Module or $Page == 'loads' and $Module == 'category' or $Page == 'loads' and $Module == 'main') include('module/loads/main.php');
	else if ($Module == 'material') include('module/loads/material.php');
	else if ($Module == 'add') include('module/loads/add.php');
	else if ($Module == 'edit') include('module/loads/edit.php');
	else if ($Module == 'control') include('module/loads/control.php');
	else if ($Module == 'download') include('module/loads/download.php');
}



else if ($Page == 'calendar') echo include('page/secretary.php');
else if ($Page == 'graphic') include('page/graphic.php');
else if ($Page == 'secretary') include('page/secretary.php');
else if ($Page == 'calculator') include('page/calculator.php');
else if ($Page == 'lawyer') include('page/lawyer.php');
else if ($Page == 'accountant') include('page/accountant.php');
else if ($Page == 'business') include('page/business.php');
else if ($Page == 'admin') include('page/adminTable.php');

else if ($Page == 'all') include('page/all_table/allTable.php');
else if ($Page == 'insert') include('page/all_table/insert.php');

else if ($Page == 'select') include('page/dbSelect.php');

else if ($Page == 'account')  include('forms/account.php');

else if ($Page == 'search')  include('page/search.php');




// функция отправки сообщения
function MessageSend($p1, $p2, $p3 = '') {
if ($p1 == 1) $p1 = 'Помилка' and $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.$p1.'!</strong> '.$p2.'</div>';
else if ($p1 == 2) $p1 = 'Підсказка'and $_SESSION['message'] = '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.$p1.'!</strong> '.$p2.'</div>';
else if ($p1 == 3) $p1 = 'Інформація'and $_SESSION['message'] = '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'.$p1.'!</strong> '.$p2.'</div>';
//;
// переход на страницу
if ($p3) $_SERVER['HTTP_REFERER'] = $p3;
exit(header('Location: '.$_SERVER['HTTP_REFERER']));
}

// функция поиска
function searcForm () {
	global $Page;
	echo '<nav class="nav navbar-nav navbar-right"><form form method="POST" action="/search'.$Page.'" class="form-inline my-2 my-lg-0 search"><input class="form-control mr-sm-2 nav-item" type="text" placeholder="Search"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button></form></nav>';
}

// функция показа сообщения
function MessageShow() {
if ($_SESSION['message'])$Message = $_SESSION['message'];
echo $Message;
$_SESSION['message'] = array();
}

// групи пользователей 
function userGroup ($p1) {
	if ($p1 == 0) return 'Гість';
	else if ($p1 == 1) return 'Модератор';
	else if ($p1 == 2) return 'Адміністратор';
	else if ($p1 == -1) return 'Заблокований';
}

// доступ черес ети групи
function userAccess($p1) {
	if ($_SESSION['USER_GROUP'] < $p1)  MessageSend (1, 'У вас не має прав доступу для перегляду цієї сторінки', '/');
}

// функция анти гость
function ULogin ($p1) {
	if ($p1 <=0 and $_SESSION['USER_LOGIN_IN'] != $p1) MessageSend (1, 'Данна сторінка доступга тільки для гостей', '/login');
	else if ($_SESSION['USER_LOGIN_IN'] != $p1)  MessageSend (1, 'Для перегляду сторінки зареєструйтеся будь-ласка!', '/register');
}


// функция обработки форми
function FormChars ($p1) {
return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
}

// шифровка пароля 
function GenPass ($p1, $p2) {
    return md5('MRRUSLAN'.md5('594'.$p1.'741').md5('910'.$p2.'531'));
}

// фенкция генерации набор случайніх символов
function RandomString($p1) {
$Char = '0123456789abcdefghijklmnopqrstuvwxyz';
for ($i = 0; $i < $p1; $i ++) $String .= $Char[rand(0, strlen($Char) - 1)];
return $String;
}

// скрить str
function HideEmail($p1) {
$Explode = explode('@', $p1);
return $Explode[0].'@*****';
}

// функция переключателя страниц
function PageSelector($p1, $p2, $p3, $p4 = 5) {
	
/*
$p1 - URL (Например: /news/main/page)
$p2 - Текущая страница (из $Param['page'])
$p3 - Кол-во новостей
$p4 - Кол-во записей на странице
*/
$Page = ceil($p3[0] / $p4); //делим кол-во новостей на кол-во записей на странице.
if ($Page > 1) { //А нужен ли переключатель?
echo '<nav  class="col-md-offset-5" aria-label="Page navigation"><ul class="pagination">';
for($i = ($p2 - 3); $i < ($Page + 1); $i++) {
if ($i > 0 and $i <= ($p2 + 3)) {
if ($p2 == $i) $Swch = 'active';
else $Swch = 'pagination';
echo ' <li class="'.$Swch.'"><a  href="'.$p1.$i.'">'.$i.'</a></li>';
}
}
echo '</ul></nav>';
}
}

function MiniIMG($p1, $p2, $p3, $p4, $p5 = 50) {
	/*
	$p1 - Путь к изображению, которое нужно уменьшить.
	$p2 - Директория, куда будет сохранена уменьшенная копия.
	$p3 - Ширина уменьшенной копии.
	$p4 - Высота уменьшенной копии.
	$p5 - Качество уменьшенной копии.
	*/
	$Scr = imagecreatefromjpeg($p1);
	$Size = getimagesize($p1);
	$Tmp = imagecreatetruecolor($p3, $p4);
	imagecopyresampled($Tmp, $Scr, 0, 0, 0, 0, $p3, $p4, $Size[0], $Size[1]);
	imagejpeg($Tmp, $p2, $p5);
	imagedestroy($Scr);
	imagedestroy($Tmp);
}


function read () {

}

// вставка header на страници
function Head($p1) {
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><title>'.$p1.'</title><link rel="stylesheet" href="/resource/css/style.css">  <link rel="stylesheet" href="/resource/css/bootstrap.min.css">   <script src="/resource/js/jquery.min.js"></script>   <script src="/resource/js/bootstrap.min.js"></script></head>';
}
function Menu() {
	//avatar
	if ($_SESSION['USER_AVATAR'] == 0) $Avatar = 0;
	else $Avatar = $_SESSION['USER_AVATAR'].'/'.$_SESSION['USER_ID'];

  if ($_SESSION['USER_LOGIN_IN'] != 1) $Menu = '<ul class="nav navbar-nav navbar-right"><li class="nav-item"><a class="nav-link" href="/register"><span class="glyphicon glyphicon-log-in"></span> Реєстрація</a></li><li class="nav-item"><a class="nav-link" href="/login"><span class="glyphicon glyphicon-user"></span> Вхід</a></li><li class="nav-item"><a class="nav-link" href="/restore">Відновити пароль</a></li></ul>';
	else  $Menu = '<div class="collapse navbar-collapse" id="myNavbar"><ul class="nav navbar-nav"><li><a href="#"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>Файли</a></li>         <li><a href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Таблиці</a></li><li><a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>Чат</a></li></ul><ul class="nav navbar-nav navbar-right"><li><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>Повідомлення</a></li><li class="dropdown"><a href="#" class="dropdown-toggle navbar-brand " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img alt="Brand" class="foto" src="/resource/avatar/'.$Avatar.'.jpg""></a><ul class="dropdown-menu"><li><a href="/profile">Мій профіль</a></li><li><li role="separator" class="divider"></li><li><a href="/account/logout">Вийти</a></li></ul>';
    echo '<nav class="navbar navbar-inverse"><div class="container-fluid"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"><span class="icon-bar"></span><span class="icon-bar"></span<span class="icon-bar"></span></button><a class="navbar-brand" href="/"><img alt="Brand" src="/resource/img/bg.png" width="132px" height="47px"></a></div>'.$Menu.'</div></nav>';
}

function footer() {
	echo '<footer class="container-fluid text-center"><p>Footer Text</p></footer></body></html>';
}

?>