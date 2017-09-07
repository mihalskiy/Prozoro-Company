<?php
userAccess(2);

if ($Param['id'] and $Param['command']) {

if ($Param['command'] == 'delete') {
$Row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `dfile` FROM `load` WHERE `id` = $Param[id]"));
mysqli_query($CONNECT, "DELETE FROM `load` WHERE `id` = $Param[id]");
// unlink('catalog/img/'.$Row['dimg'].'/'.$Param['id'].'.jpg');
// unlink('catalog/mini/'.$Row['dimg'].'/'.$Param['id'].'.jpg');
if ($Row['dfile']) unlink('catalog/file/'.$Row['dfile'].'/'.$Param['id'].'.zip');
MessageSend(3, 'Файл видалено із бази даних.', '/loads');

// } else if ($Param['command'] == 'active') {
// mysqli_query($CONNECT, "UPDATE `load` SET `active` = 1 WHERE `id` = $Param[id]");
// MessageSend(3, 'Файл активований.', '/loads/material/id/'.$Param['id']);
}


}
?>