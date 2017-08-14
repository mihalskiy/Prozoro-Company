<?php 
$Param['id'] += 0;
if ($Param['id'] == 0) MessageSend(1, 'URL адресу вказано не вірно', '/news');

$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, 'SELECT `name`, `added`, `date`, `readed`, `text` FROM `news` WHERE `id` = '.$Param['id']));
if (!$Row['name']) MessageSend(1, 'Такї новини не знайдено.', '/news');
mysqli_query($CONNECT, 'UPDATE `news` SET `read` = `read` + 1 WHERE `id` = '.$Param['id']);
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
  <li role="presentation" class="active"><a href="/news">Усі категорії</a></li>
  <li role="presentation"><a href="/news/category/id/1">Категорія 1</a></li>
  <li role="presentation"><a href="/news/category/id/2">Категорія 2</a></li>
  <li role="presentation"><a href="/news/category/id/3">Категорія 3</a></li>
</ul>
<div class="pageNews">
    <?php
     if ($_SESSION['USER_GROUP'] == 7) $EDIT = '<li><a href="/news/edit/id/'.$Param['id'].'" class="">Редагувати новину</a></li>';
     echo 'Переглядів: '.($Row['read'] + 1).' | Добавив: '.$Row['added'].' | Дата: '.$Row['date'].' '.$EDIT.'<br><br><b>'.$Row['name'].'</b><br>'.$Row['text']
     
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