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
?> 