<?php
//userAccess(2);

if ($Param['id'] and $Param['command']) {


if ($Param['command'] == 'delete') {
    mysqli_query($CONNECT, "DELETE FROM `news` WHERE `id` = $Param[id]");
    MessageSend(3, 'Новина успішно видалена з бази', '/news');

} else if ($Param['command'] == 'active') {
mysqli_query($CONNECT, "UPDATE `news` SET `active` = 1 WHERE `id` = $Param[id]");
    MessageSend(3, 'Новина успішно активована', '/news/material/id/'.$Param['id']);
}

}


?>