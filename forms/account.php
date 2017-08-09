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

$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'login' FROM 'users' WHERE 'email' = '$_POST[email]'"));
if ($Row['email']) exit('email <b>'.$_POST['email'].'</b> вже використовується.');

// витягиваем данние
mysqli_query($CONNECT, "INSERT INTO `users`  VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', NOW(), '$_POST[email]', '$_POST[avatar]')");
echo 'OK';

} 
?> 