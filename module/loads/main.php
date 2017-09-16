<?php
if ($Module == 'category' and $Param['id'] != 1 and $Param['id'] != 2 and $Param['id'] != 3 and $Param['id'] != 4) MessageSend(1, 'Такої категорії не знайдено.', '/loads');
$Param['page'] += 0;
Head('Архів файлів');
?>
<body>
            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu()?>  
        </div>
             <?php  MessageShow() ?>
             <nav class="navbar bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    <ul class="nav nav-tabs nav-justified">
<?php  if ($_SESSION['USER_LOGIN_IN']) echo '<li><a href="/loads/add" class="btn btn-success btn-lg">Додати файли</a></li>'?>
  <li role="presentation" class="active nav-item"><a href="/loads">Усі категорії</a></li>
  <li class="nav-item" role="presentation"><a href="/loads/category/id/1">Юрист</a></li>
  <li class="nav-item" role="presentation"><a href="/loads/category/id/2">Бухгалтер</a></li>
  <li class="nav-item" role="presentation"><a href="/loads/category/id/3">Кошторисник</a></li>
  <li class="nav-item" role="presentation"><a href="/loads/category/id/4">Діловод</a></li>
  <?php SearchForm() ?>
  </nav>
</ul>
<div class="pageNews">
    <?php
        if (!$Module or $Module == 'main') {  
// от зависемости где пользовател находиться
            if ($_SESSION['USER_GROUP'] != 2) $Active = 'WHERE `active` = 1';
// Извлекаем записи с БД с сортировкой новостой по ид от нових к старим с лимитом 5 записей
            $Param1 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `load` '.$Active.' ORDER BY `id` DESC LIMIT 12';
            $Param2 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `load` '.$Active.' ORDER BY `id` DESC LIMIT START, 12';
// подщидка новостей по ид
           $Param3 = 'SELECT COUNT(`id`) FROM `load`';
// адрес переключателя страниц
            $Param4 = '/loads/main/page/';
        } else if ($Module == 'category') {
            if ($_SESSION['USER_GROUP'] != 2) $Active = 'AND `active` = 1';
// Извлекаем записи с БД по категориям с лимитом 5 записей
            $Param1 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `load` WHERE `cat` = '.$Param['id'].' '.$Active.' ORDER BY `id` DESC LIMIT 12';
            $Param2 = 'SELECT `id`, `name`, `added`, `date`, `active` FROM `load` WHERE `cat` = '.$Param['id'].' '.$Active.' ORDER BY `id` DESC LIMIT START, 12';            
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
        $Start = ($Param['page'] - 1) * 12;
        $Result = mysqli_query($CONNECT, str_replace('START', $Start, $Param2));
    }
        
        // подключение к бд
while ($Row = mysqli_fetch_assoc($Result)) {
if (!$Row['active']) $Row['name'] .= ' (Очікує пітвердження)';
echo '<a href="/loads/material/id/'.$Row['id'].'"><div class="panel panel-success"><div class="panel-heading"> Добавив: '.$Row['added'].' | '.$Row['date'].'<h4>'.$Row['name'].'</h4></div></div></a>';
}
    PageSelector($Param4, $Param['page'], $Count);
    ?>
</div>
        </div>

<?php footer() ?>