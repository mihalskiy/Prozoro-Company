<?php
if ($_SESSION['USER_GROUP'] == 2) $Active = 1;
else $Active = 0;

// если наши платформи зареестр то будем виполнять таки запросси
if ($_POST['enter'] and $_POST['text'] and $_POST['name']  and $_POST['cat'] and $_FILES['file']['tmp_name'] and $_FILES['img']['tmp_name']) {
    if  ($_FILES['img']['type'] != 'image/jpeg') MessageSend(2, 'Не вірний тип забраження');
    if  ($_FILES['file']['type'] != 'application/octet-stream') MessageSend(2, 'Не вірний тип файлу');

    
    
    $_POST['name'] = FormChars($_POST['name']);
    $_POST['text'] = FormChars($_POST['text']);
    // = number
    $_POST['cat'] += 0;

$MaxId = mysqli_fetch_row(mysqli_query($CONNECT, 'SELECT max(`id`) FROM `load`'));
//if ($MaxId[0] == 0) mysqli_query($CONNECT, 'ALTER TABLE `load` AUTO_INCREMENT = 1');
$MaxId[0] += 1;

// функция записи если foto не вибран
foreach (glob ('catalog/img/*', GLOB_ONLYDIR) as $num => $Dir) {
$num_img ++;
$Count = sizeof(glob($Dir.'/*.*'));
if ($Count < 250) {
    move_uploaded_file($_FILES['img']['tmp_name'], $Dir.'/'.$MaxId[0].'.jpg');
break;
}
}


// функция записи если file не вибран
foreach (glob ('catalog/file/*', GLOB_ONLYDIR) as $num => $Dir) {
$num_file ++;
$Count = sizeof(glob($Dir.'/*.*'));
if ($Count < 250) {
    move_uploaded_file($_FILES['file']['tmp_name'], $Dir.'/'.$MaxId[0].'.zip');
break;
}
}



// витяговаем данние 
mysqli_query($CONNECT, "INSERT INTO `load`  VALUES ('', '$_POST[name]', $_POST[cat], 0, 0, '$_SESSION[USER_LOGIN]', '$_POST[text]',  NOW(), $Active, $num_img, $num_file)");
MessageSend(3, 'Файли успішно завантажені в базу', '/loads');
}

Head('Додати новини')?>
<body>
<div class="container">
    <div class="row">
            <!-- Menu -->
        <div class="innerMenu">
              <?php Menu();
              MessageShow()?>  
        </div>
            <!--content-->
        <div class="content">
            <div class="row">
                   
                   <div class="container ">
        <div class="registerForm">
            <h2> Добавити файли</h2>
            <form method="POST" action="/loads/add" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Назва матеріалу</label>
                    <input type="text" class="form-control" name="name"  placeholder="Назва новини" required>
                </div>
                <div class="form-group">
                    <label for="login">Виберіть каегорію</label>
                    <select class="form-control" name="cat">
                        <option value="1">Юрист</option>
                        <option value="2">Бухгалтер</option>
                        <option value="3">Кошторисник</option>
                        <option value="4">Діловод</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="login">Текст </label>
                    <textarea name="text" class="form-control" rows="3"  placeholder="текст..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="avatar">Завантаження файлів</label>
                    <input type="file" name="file">
                    <p class="help-block">Завантажте файл формату .zip</p>
                </div>
                <div class="form-group">
                    <label for="avatar">Завантаження зображення</label>
                    <input type="file" name="img">
                    <p class="help-block">Завантажте фото</p>
                </div>
                <input type="submit" name="enter" class="btn btn-success" value="Опоблікувати">
            </form>
        </div>
    </div>
</div>
            </div>
        </div>

            <!--footer-->
        <div class="footer">
            <div class="row">
                <footer>

                </footer>
            </div>
        </div>

    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
