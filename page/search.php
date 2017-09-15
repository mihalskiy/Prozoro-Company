<?php 
ULogin(2);

if ($_POST['enter']) {
$_SESSION['SEARCH'] = FormChars($_POST['text']);
exit(header('location: /search/'.$Module));
}


if (!$_SESSION['SEARCH']) MessageSend(1, 'Слово для поиска не указано.', '/');


Head('Пошук');
?>
<body>

            <?php Menu();

             MessageShow() ?>
<?php echo  $_SESION['SEARCH']; ?>

<?php footer() ?>