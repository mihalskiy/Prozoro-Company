<?php 
//виход из сессии
if($Module == 'logout' and $_SESSION['USER_LOGIN_IN'] = 1) {
    if ($_COOKIE['user']) {
        setcookie('user', '', strtotime('-30 days') , '/');
    unset($_COOKIE['user']);
    }
session_unset();
exit (header('Location: /login'));
}

// доступ для гостей
ULogin(0);

// защита отправки пустой формі
if ($Module == 'register' and $_POST['enter']) {
$_POST['login'] = FormChars($_POST['login']);
$_POST['email'] = FormChars($_POST['email']);
$_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['login']);
$_POST['name'] = FormChars($_POST['name']);
$_POST['captcha'] = FormChars($_POST['captcha']);
// проверка на пустоту форм
if (!$_POST['login'] or !$_POST['email'] or !$_POST['password'] or !$_POST['name'] or $_POST['country'] > 4 or !$_POST['captcha']) MessageSend(1, 'Не можливо обробити  форму.');
//проверка каптчи
if ($_SESSION['captcha'] != md5($_POST['captcha'])) MessageSend(1, 'Код веддено не вірно.');

// проверка значений в базе
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `login` FROM `users` WHERE `login` = '$_POST[login]'"));
if ($Row['login']) exit('Логін <b>'.$_POST['login'].'</b> вже використовується.');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `email` FROM `users` WHERE `email` = '$_POST[email]'"));
if ($Row['email']) exit('E-Mail <b>'.$_POST['email'].'</b> вже використовується.');

// витягиваем данние
mysqli_query($CONNECT, "INSERT INTO `users`  VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', NOW(), '$_POST[email]',  0, 0)");
$Code = substr(base64_encode($_POST['email']), 0, -1);

// отправка email
mail($_POST['email'], 'Реєстрація на сайті Prozoro-Compay', 'Посилання для активації: http:/prozoro-compay/account/activate/code/'.substr($Code, -5).substr($Code, 0, -5), 'From: Prozoro-Compay');
MessageSend(3, 'Рєстрація  акаунта успішно закінчена. На вказану E-mail адресу <b>'.$_POST['email'].'</b> відправлено лист  пітвердження  реєстрації.');
}

//потверждения емейл
else if ($Module == 'activate' and $Param['code']) {
if (!$_SESSION['USER_ACTIVE_EMAIL'] or $_SESSION['USER_ACTIVE_EMAIL'] != $email) {
$Email = base64_decode(substr($Param['code'], 5).substr($Param['code'], 0, 5));
if (strpos($Email, '@') !== false) {
mysqli_query($CONNECT, "UPDATE `users`  SET `active` = 1 WHERE `email` = '$Email'");
$_SESSION['USER_ACTIVE_EMAIL'] = $Email;
MessageSend(3, 'E-mail <b>'.$Email.'</b> пітвердженно.', '/login');
}
else MessageSend(1, 'E-mail адрес не пітвердженно.', '/login');
}
else MessageSend(1, 'E-mail адрес <b>'.$_SESSION['USER_ACTIVE_EMAIL'].'</b> вже пітвердженно.', '/login');
}


// модуль авторизации
else if ($Module == 'login' and $_POST['enter']) {
$_POST['login'] = FormChars($_POST['login']);
$_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['login']);
$_POST['captcha'] = FormChars($_POST['captcha']);
 // проверка на пустость
if (!$_POST['login'] or !$_POST['password'] or !$_POST['captcha']) MessageSend(1, 'Не можливо обробити форму.');
if ($_SESSION['captcha'] != md5($_POST['captcha'])) MessageSend(1, 'Код перевірки введенно не вірно.');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `password`, `active` FROM `users` WHERE `login` = '$_POST[login]'"));
if ($Row['password'] != $_POST['password']) MessageSend(1, 'Не правельний логін чи пароль.');
if ($Row['active'] == 0) MessageSend(1, 'Аккаунт користувача <b>'.$_POST['login'].'</b> не пітвердженно.');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id`, `name`, `regdate`, `email`,  `avatar` FROM `users` WHERE `login` = '$_POST[login]'"));
// присваюем юзерам данние
$_SESSION['USER_ID'] = $Row['id'];
$_SESSION['USER_NAME'] = $Row['name'];
$_SESSION['USER_REGDATE'] = $Row['regdate'];
$_SESSION['USER_EMAIL'] = $Row['email'];
$_SESSION['USER_AVATAR'] = $Row['avatar'];
$_SESSION['USER_LOGIN_IN'] = 1;
//хранение кукки
if($_REQUEST['remember'] ) setcookie('user', $_POST['password'], strtotime('+5 days'), '/');
exit(header('Location: /profile'));
}
?>