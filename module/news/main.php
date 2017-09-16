<?php
if ($Module == 'category' and $Param['id'] != 1 and $Param['id'] != 2 and $Param['id'] != 3) MessageSend(1, 'Такої категорії не знайдено.', '/news');
$Param['page'] += 0;
Head('Новини');
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
<?php  if ($_SESSION['USER_LOGIN_IN']) echo '<li><a href="/news/add" class="btn btn-success btn-lg">Добавити новину</a></li>'?>
  <li role="presentation" class="active"><a href="/news">Усі категорії</a></li>
  <li role="presentation"><a href="/news/category/id/1">Категорія 1</a></li>
  <li role="presentation"><a href="/news/category/id/2">Категорія 2</a></li>
  <li role="presentation"><a href="/news/category/id/3">Категорія 3</a></li>
  <?php  SearchForm() ?>
</ul>
<div class="pageNews">
    <?php
        if (!$Module or $Module == 'main') {  

// от зависемости где пользовател находиться
            if ($_SESSION['USER_GROUP'] != 2) $Active = 'WHERE `active` = 1';
// Извлекаем записи с БД с сортировкой новостой по ид от нових к старим с лимитом 5 записей
            $Param1 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `news` '.$Active.' ORDER BY `id` DESC LIMIT 0, 5';
            $Param2 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `news` '.$Active.' ORDER BY `id` DESC LIMIT START, 5';
// подщидка новостей по ид
           $Param3 = 'SELECT COUNT(`id`) FROM `news`';
// адрес переключателя страниц
            $Param4 = '/news/main/page/';
        } else if ($Module == 'category') {
            if ($_SESSION['USER_GROUP'] != 2) $Active = 'AND `active` = 1';
// Извлекаем записи с БД по категориям с лимитом 5 записей
            $Param1 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `news` WHERE `cat` = '.$Param['id'].' '.$Active.' ORDER BY `id` DESC LIMIT 0, 5';
            $Param2 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `news` WHERE `cat` = '.$Param['id'].' '.$Active.' ORDER BY `id` DESC LIMIT START, 5';            $Param3 = 'SELECT COUNT(`id`) FROM `news` WHERE `cat` = '.$Param['id'];
            $Param4 = '/news/category/id/'.$Param['id'].'/page/';
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

echo '<a href="/news/material/id/'.$Row['id'].'"><div class="ChatBlock"><span>Добавил: '.$Row['added'].' | '.$Row['date'].'</span>'.$Row['name'].'</div></a>';
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


<?php footer() ?>