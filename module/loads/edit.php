<?php 
userAccess(2);
// проверка на ид обезателен
$Param['id'] += 0;
if (!$Param['id']) MessageSend(1, 'Не вказано ID файла', '/loads');

// проверка на существуюющую новость
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `cat`,  `name`, `text`, `dfile` FROM `load` WHERE `id` = '$Param[id]'"));
if (!$Row['name']) MessageSend(1, 'Такої сторінки не знайдено.', '/loads');

// если наши платформи зареестр то будем виполнять таки запросси
if ($_POST['enter'] and $_POST['text'] and $_POST['name']  and $_POST['cat']) {
    $_POST['name'] = FormChars($_POST['name']);
    $_POST['text'] = FormChars($_POST['text']);
    // = number
    $_POST['cat'] += 0;

if ($_FILES['file']['tmp_name']) move_uploaded_file($_FILES['file']['tmp_name'], 'catalog/file/'.$Row['dfile'].'/'.$Param['id'].'.zip');


// витяговаем данние 
mysqli_query($CONNECT, "UPDATE `load` SET `name` = '$_POST[name]', `cat` = $_POST[cat], `text` = '$_POST[text]' WHERE `id` = $Param[id]");
MessageSend(2, 'Файл успішно змінено', '/loads/material/id/'.$Param['id']);
}


 
Head('Редагуваня файлів');
?>
<body>
<div class="container">
    <div class="row">
            <!-- Menu -->
        <div class="innerMenu">
<?php 
Menu()
?>  
        </div>
            <!--content-->
        <div class="content">
            <div class="row">
             <?php  MessageShow() ?>
                   <div class="container ">
        <div class="registerForm">
            <h2> Добавити новину</h2>
<?php
    echo '        <form method="POST" action="/loads/edit/id/'.$Param['id'].'" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Назва мітеріалу</label>
                    <input type="text" class="form-control" name="name" value="'.$Row['name'].'" placeholder="Назва мітеріалу" required>
                </div>
                <div class="form-group">
                    <label for="login">Виберіть каегорію</label>
                    <select class="form-control" name="cat">'.str_replace('value="'.$Row['cat'], 'selected value="'.$Row['cat'], '<option value="1">Юрист</option><option value="2">Бухгалтер</option><option value="3">Кошторисник</option><option value="4">Діловод</option>').'</select>
                </div>
                <div class="form-group">
                    <label for="login">Текст</label>
                    <textarea name="text" class="form-control" rows="3"  placeholder="текст..." required>'.$Row['text'].'</textarea>
                </div>
                <div class="form-group">
                    <label for="avatar">Завантаження файлів</label>
                    <input type="file" name="file">
                    <p class="help-block">Завантажте файл формату .zip</p>
                </div>
                <input type="submit" name="enter" class="btn btn-success" value="Зберігти">
            </form>'
?>
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
<script src="/resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
