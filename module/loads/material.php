<?php 
$Param['id'] += 0;
if ($Param['id'] == 0) MessageSend(1, 'URL адресу вказано не вірно', '/loads');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, 'SELECT `name`, `added`, `date`, `readed`, `text`, `active` , `download`, `dimg`, `dfile` FROM `load` WHERE `id` = '.$Param['id']));
if (!$Row['name']) MessageSend(1, 'Такї новини не знайдено.', '/loads');

if(!$Row['active'] and $_SESSION['USER_GROUP'] != 2)  MessageSend(2, 'Новина чекає пітвердження адміністратора', '/loads');

mysqli_query($CONNECT, 'UPDATE `load` SET `read` = `read` + 1 WHERE `id` = '.$Param['id']);
Head($Row['name']);
?>
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
          <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="/loads">Усі категорії</a></li>
  <li role="presentation"><a href="/loads/category/id/1">Юрист</a></li>
  <li role="presentation"><a href="/loads/category/id/2">Бухгалтер</a></li>
  <li role="presentation"><a href="/loads/category/id/3">Кошторисник</a></li>
  <li role="presentation"><a href="/loads/category/id/4">Діловод</a></li>
</ul>
<div class="pageNews">
    <?php
   if (!$Row['active']) $Active = '| <a href="/loads/control/id/'.$Param['id'].'/command/active" class="lol">Активировать новость</a>';
if ($_SESSION['USER_GROUP'] == 2) $EDIT = '| <a href="/loads/edit/id/'.$Param['id'].'" class="lol">Редактировать новость</a> | <a href="/loads/control/id/'.$Param['id'].'/command/delete" class="lol">Удалить новость</a>'.$Active;
     echo 'Переглядів: '.($Row['readed'] + 1).' | Завантажень: '.($Row['download'] + 1).' |  Добавив: '.$Row['added'].' | Дата: '.$Row['date'].' '.$EDIT.'<br><br><b>'.$Row['name'].'</b><br><img src="/catalog/img/'.$Row['dimg'].'/'.$Param['id'].'.jpg" alt="'.$Row['name'].'"><br>'.$Row['text'];
     
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>