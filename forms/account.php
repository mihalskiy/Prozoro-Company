<?php
// защита отправки пустой формі
if ($Module == 'register' and $_POST['enter']) {
    $_POST['login'] = FormChars($_POST['login']);
    $_POST['email'] = FormChars($_POST['email']);
    $_POST['password'] = GenPass(FormChars($_POST['password']), $_POST['login']);
    $_POST['name'] = FormChars($_POST['name']);
if (!$_POST['login'] or !$_POST['email'] or !$_POST['password'] or !$_POST['name']) exit ('Помилка валідації форми');


// проверка значений в базе
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'login' FROM 'users' WHERE 'login' = '$_POST[login]'"));
if ($Row['login']) exit('Логін <b>'.$_POST['login'].'</b> вже використовується.');

$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT 'login' FROM 'users' WHERE 'email' = '$_POST[email]'"));
if ($Row['email']) exit('email <b>'.$_POST['email'].'</b> вже використовується.');

// витягиваем данние
mysqli_query($CONNECT, "INSERT INTO `users`  VALUES ('', '$_POST[login]', '$_POST[password]', '$_POST[name]', NOW(), '$_POST[email]')");
echo 'OK';

} 
?>