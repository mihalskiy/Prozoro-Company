<?php
if ($Module == 'category' and $Param['id'] != 1 and $Param['id'] != 2 and $Param['id'] != 3 and $Param['id'] != 4) MessageSend(1, 'Такої категорії не знайдено.', '/loads');
$Param['page'] += 0;
Head('Архів файлів');
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
<?php  if ($_SESSION['USER_LOGIN_IN']) echo '<li><a href="/loads/add" class="btn btn-success btn-lg">Додати файли</a></li>'?>
  <li role="presentation" class="active"><a href="/loads">Усі категорії</a></li>
  <li role="presentation"><a href="/loads/category/id/1">Юрист</a></li>
  <li role="presentation"><a href="/loads/category/id/2">Бухгалтер</a></li>
  <li role="presentation"><a href="/loads/category/id/3">Кошторисник</a></li>
  <li role="presentation"><a href="/loads/category/id/4">Діловод</a></li>
</ul>
<div class="pageNews">
    <?php
        if (!$Module or $Module == 'main') {  

// от зависемости где пользовател находиться
            if ($_SESSION['USER_GROUP'] != 2) $Active = 'WHERE `active` = 1';
// Извлекаем записи с БД с сортировкой новостой по ид от нових к старим с лимитом 5 записей
            $Param1 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `load` '.$Active.' ORDER BY `id` DESC LIMIT 0, 5';
            $Param2 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `load` '.$Active.' ORDER BY `id` DESC LIMIT START, 5';
// подщидка новостей по ид
           $Param3 = 'SELECT COUNT(`id`) FROM `load`';
// адрес переключателя страниц
            $Param4 = '/loads/main/page/';
        } else if ($Module == 'category') {
            if ($_SESSION['USER_GROUP'] != 2) $Active = 'AND `active` = 1';
// Извлекаем записи с БД по категориям с лимитом 5 записей
            $Param1 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `load` WHERE `cat` = '.$Param['id'].' '.$Active.' ORDER BY `id` DESC LIMIT 0, 5';
            $Param2 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `load` WHERE `cat` = '.$Param['id'].' '.$Active.' ORDER BY `id` DESC LIMIT START, 5';            
            $Param3 = 'SELECT COUNT(`id`) FROM `load` WHERE `cat` = '.$Param['id'];
            $Param4 = '/loads/category/id/'.$Param['id'].'/page/';
        }

            $Count = mysqli_fetch_row(mysqli_query($CONNECT, $Param3));

    //проверка
    if (!$Param['page']) {
        $Param['page'] = 1;
    $Result = mysqli_query($CONNECT, $Param1);
    } else {
    // с какого места нужно начинать віборку со страници
        $Start = ($Param['page'] - 1) * 5;
        $Result = mysqli_query($CONNECT, str_replace('START', $Start, $Param2));
    }

        

        // подключение к бд
while ($Row = mysqli_fetch_assoc($Result)) {
if (!$Row['active']) $Row['name'] .= ' (Очікує пітвердження)';

echo '<a href="/loads/material/id/'.$Row['id'].'"><div class="ChatBlock"><span>Добавил: '.$Row['added'].' | '.$Row['date'].'</span>'.$Row['name'].'</div></a>';
}
    PageSelector($Param4, $Param['page'], $Count);
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
<script src="resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>