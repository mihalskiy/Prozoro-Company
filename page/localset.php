<?php

function myTrace($str) {
    // Adjust the log file name before uncommenting
    //@file_put_contents("/tmp/localset.log", $str."\n", FILE_APPEND);
}

myTrace(print_r($_REQUEST,true));

// connect to the database
$link = mysqli_init();

// Adjust host, user, password and dbname before use!
$db = mysqli_real_connect($link, "myhost", "myuser", "mypass", "test");
if (!$db) {
    die('Connect Error ('.mysqli_connect_errno().'): '.mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");

$page  = isset($_REQUEST['page']) ? $_REQUEST['page'] : 0;          // get the requested page
$limit = isset($_REQUEST['rows']) ? $_REQUEST['rows'] : 50;         // get how many rows we want to have into the grid
$sidx  = isset($_REQUEST['sidx']) ? $_REQUEST['sidx'] : 1;          // get index row - i.e. user click to sort
$sord  = isset($_REQUEST['sord']) ? $_REQUEST['sord'] : "asc";      // get the direction

if ($_REQUEST["_search"] == "false") {
    $where = "where 1";
} else {
    $operations = array(
        'eq' => "= '%s'",            // Equal
        'ne' => "<> '%s'",           // Not equal
        'lt' => "< '%s'",            // Less than
        'le' => "<= '%s'",           // Less than or equal
        'gt' => "> '%s'",            // Greater than
        'ge' => ">= '%s'",           // Greater or equal
        'bw' => "like '%s%%'",       // Begins With
        'bn' => "not like '%s%%'",   // Does not begin with
        'in' => "in ('%s')",         // In
        'ni' => "not in ('%s')",     // Not in
        'ew' => "like '%%%s'",       // Ends with
        'en' => "not like '%%%s'",   // Does not end with
        'cn' => "like '%%%s%%'",     // Contains
        'nc' => "not like '%%%s%%'", // Does not contain
        'nu' => "is null",           // Is null
        'nn' => "is not null"        // Is not null
    ); 
    $value = mysqli_real_escape_string($link, $_REQUEST["searchString"]);
    $where = sprintf("where %s ".$operations[$_REQUEST["searchOper"]], $_REQUEST["searchField"], $value);
}

$SQL = "SELECT item_id, item, item_cd FROM items ".$where." ORDER BY $sidx $sord";
myTrace($SQL);
$result = mysqli_query($link, $SQL);
if (!$result) {
    myTrace(mysqli_error($link));
    die("Couldn't execute query: ".mysqli_error($link));
}

if ($limit < 0) $limit = 0;

$start = ($limit * $page) - $limit;
if ($start < 0) $start = 0;

$count = mysqli_num_rows($result);
if ($count > 0) {
    $total_pages = ceil($count / $limit);
} else {
    $total_pages = 0;
}

if ($page > $total_pages) {
    $page = $total_pages;
}

$responce->page    = $page;
$responce->total   = $total_pages;
$responce->records = $count;

mysqli_data_seek($result, $start);
for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
    if (($limit > 0) && ($i >= $limit)) break;
    $responce->rows[$i]['id']   = $row['item_id'];
    $responce->rows[$i]['cell'] = array($row['item_id'], $row['item'], $row['item_cd']);
} 
echo json_encode($responce);

mysqli_close($link);

?>