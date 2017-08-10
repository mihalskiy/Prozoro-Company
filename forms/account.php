<?php

// защита отправки пустой формі
if ($Module == 'register' and $_POST['enter']) {
    $_POST['login'] = FormChars($_POST['login']);
    $_POST['email'] = FormChars($_POST['email']);
    $_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['login']);
    $_POST['name'] = FormChars($_POST['name']);
    $_POST['avatar'] = FormChars($_POST['avatar']);
    $_POST['avatar'] = 0;
    $_POST['captcha'] = FormChars($_POST['captcha']);
    // проверка на пустоту форм
if (!$_POST['login'] or !$_POST['email'] or !$_POST['password'] or !$_POST['name'] or !$_POST['captcha']) MessageSend (1, ' заповнення форми');


//проверка каптчи
if ($_SESSION['captcha'] != md5($_POST['captcha'])) MessageSend (1, ' не правельно введений код перевірки');

// проверка значений в базе
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `login` FROM `users` WHERE `login` = '$_POST[login]'"));
if ($Row['login']) exit('Логін <b>'.$_POST['login'].'</b> вже використовується.');

$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `email` FROM `users` WHERE `email` = '$_POST[email]'"));
if ($Row['email']) exit('E-Mail <b>'.$_POST['email'].'</b> уже используеться.');

// витягиваем данние
mysqli_query($CONNECT, "INSERT INTO `users`  VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', NOW(), '$_POST[email]', '$_POST[avatar]', 0)");

// код для почти
$Code = substr(base64_encode($_POST['email']), 0, -1);
// отправка
mail($_POST['email'], 'Реєстрація на сайті PROZORO-COMPANY', 'Посилання для активації: http://prozorocompany/account/activate/code/'.substr($Code, 5).substr($Code, 0, -5), 'From: muxalsku@mai.ru');
MessageSend(3, 'Реєстрація пройшла успішно на вказаний E-Mail <b>'.$_POST['email'].'</b> відправленно лист підвердження');
} 

//потверждения емейл
 else if ($Module == 'activate' and $Param['code']){
    if(!$_SESSION['USER_ACTIVE_EMAIL']) {
        $Email = base64_decode(substr($Param['code'], 5).substr($Param['code'], 0, 5));
        if (strpos($Email, '@') !== false) {
            mysqli_query($CONNECT, "UPDATE 'users' SET 'active' = 1 WHERE 'email' = '$Email'");
            $_SESSION['USER_ACTIVE_EMAIL'] = $Email;
            MessageSend(3, 'E-mail адресу <b>'.$Email.'</b> пітвердженно.', '/login');
        }
        else MessageSend(1, 'E-mail адресу не пітвердженно.', '/login');
        
    }
else MessageSend(1, 'E-mail адрес <b>'.$_SESSION['USER_ACTIVE_EMAIL'].'</b> вже пітвердженно.', '/login'); }


// модуль авторизации
else if ($Module == 'login' and $_POST['enter']){
    $_POST['login'] = FormChars($_POST['login']);
    // FormChars удаляем теги (пробел) кода
    $_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['login']);
    $_POST['captcha'] = FormChars($_POST['captcha']);

    // проверка на пустость
if (!$_POST['login'] or !$_POST['password']  or !$_POST['captcha']) MessageSend (1, ' не правельно введені данні');
    //проверка каптчи
if ($_SESSION['captcha'] != md5($_POST['captcha'])) MessageSend (1, ' не правельно заповнена форма');

$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `password`, 'avtive' FROM `users` WHERE `login` = '$_POST[login]'"));
if ($Row['password'] !== $_POST['password']) MessageSend (1, ' Логін чи Пароль введені не вірно');
if ($Row['active'] == 0) MessageSend (1, 'Акаунт користувача <b>'.$_POST['login'].'</b> не пітверджено.');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'id', 'name', 'regdate', 'email',  'avatar' FROM 'users' WHERE 'login' = '$_POST[login]'"));

// присваюем юзерам данние
$_SESSION['USER_ID'] = $Row['id'];
$_SESSION['USER_NAME'] = $Row['name'];
$_SESSION['USER_REGDATE'] = $Row['regdate'];
$_SESSION['USER_EMAIL'] = $Row['email'];
$_SESSION['USER_AVATAR'] = $Row['avatar'];

$_SESSION['USER_LOGIN_IN'] = $Row['1'];
exit(header('Location: /profile'));
}

?> 