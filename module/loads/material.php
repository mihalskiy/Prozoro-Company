<?php 
$Param['id'] += 0;
if ($Param['id'] == 0) MessageSend(1, 'URL адресу вказано не вірно', '/loads');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, 'SELECT `name`, `added`, `date`, `readed`, `text`, `active` , `download`, `dfile` FROM `load` WHERE `id` = '.$Param['id']));
if (!$Row['name']) MessageSend(1, 'Такї новини не знайдено.', '/loads');

if(!$Row['active'] and $_SESSION['USER_GROUP'] != 2)  MessageSend(2, 'Новина чекає пітвердження адміністратора', '/loads');

mysqli_query($CONNECT, 'UPDATE `load` SET `readed` = `read` + 1 WHERE `id` = '.$Param['id']);
Head($Row['name']);
?>
<body>
<div class="container">
    <div class="row">
            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu()?>  
        </div>
            <!--content-->
        <div class="content">
         <?php  MessageShow() ?>
          <ul class="nav nav-tabs">

  <li role="presentation" class="active"><a href="/loads">Усі категорії</a></li>
  <li role="presentation"><a href="/loads/category/id/1">Юрист</a></li>
  <li role="presentation"><a href="/loads/category/id/2">Бухгалтер</a></li>
  <li role="presentation"><a href="/loads/category/id/3">Кошторисник</a></li>
  <li role="presentation"><a href="/loads/category/id/4">Діловод</a></li>
</ul>
<div class="pageNews">
    <?php
   if (!$Row['active']) $Active = '| <a href="/loads/control/id/'.$Param['id'].'/command/active"class="list-group-item-success">Активувати новину</a>';
if ($_SESSION['USER_GROUP'] == 2) $EDIT = '| <a href="/loads/edit/id/'.$Param['id'].'"class="list-group-item-success">Редагувати</a> | <a href="/loads/control/id/'.$Param['id'].'/command/delete" class="list-group-item-success">Видалити</a>'.$Active;
     echo '
     <p class="">
             Переглядів: '.($Row['readed'] + 1).' 
            | Завантажень: '.($Row['download'] + 1).' 
            | Добавив: '.$Row['added'].' 
            | Дата: '.$Row['date'].' 
            '.$EDIT.'
            </p><div class="jumbotron">
            <h1>'.$Row['name'].'</h1>
            <p>'.$Row['text'].'</p>
            <p><a href="/loads/download/id/'.$Param['id'].'" class="btn btn-primary btn-lg">Завантажити файл</a></p></div>';
     
    ?>
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
<script src="/resource/js/script.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>