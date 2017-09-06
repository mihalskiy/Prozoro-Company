<?php 
$Param['id'] += 0;
if ($Param['id'] == 0) MessageSend(1, 'URL адресу вказано не вірно', '/news');
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, 'SELECT `name`, `added`, `date`, `readed`, `text`, `active` FROM `news` WHERE `id` = '.$Param['id']));
if (!$Row['name']) MessageSend(1, 'Такї новини не знайдено.', '/news');

if(!$Row['active'] and $_SESSION['USER_GROUP'] != 2)  MessageSend(2, 'Новина чекає пітвердження адміністратора', '/news');

mysqli_query($CONNECT, 'UPDATE `news` SET `read` = `read` + 1 WHERE `id` = '.$Param['id']);
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
  <li role="presentation" class="active"><a href="/news">Усі категорії</a></li>
  <li role="presentation"><a href="/news/category/id/1">Категорія 1</a></li>
  <li role="presentation"><a href="/news/category/id/2">Категорія 2</a></li>
  <li role="presentation"><a href="/news/category/id/3">Категорія 3</a></li>
</ul>
<div class="pageNews">
    <?php
   if (!$Row['active']) $Active = '| <a href="/news/control/id/'.$Param['id'].'/command/active" class="lol">Активувати новину</a>';
if ($_SESSION['USER_GROUP'] == 2) $EDIT = '| <a href="/news/edit/id/'.$Param['id'].'" class="lol">Рудагувати новину</a> | <a href="/news/control/id/'.$Param['id'].'/command/delete" class="lol">Видалити новину</a>'.$Active;
     echo 'Переглядів: '.($Row['readed'] + 1).' | Добавив: '.$Row['added'].' | Дата: '.$Row['date'].' '.$EDIT.'<br><br><b>'.$Row['name'].'</b><br>'.$Row['text']
     
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

<?php footer() ?>