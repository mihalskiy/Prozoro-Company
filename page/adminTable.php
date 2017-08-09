<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

include_once "config.php";

include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

// Database config file to be passed in phpgrid constructor
$db_conf = array( 	
					"type" 		=> PHPGRID_DBTYPE, 
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
				);

$g = new jqgrid($db_conf); 

// set table for CRUD operations 
$g->table = "office"; 
     
$grid["caption"] = "Адмін"; 
$grid["autowidth"] = true; 
$grid["toolbar"] = "up"; 
$grid["autoresize"] = true; // responsive effect 
$grid["view_options"]['width']='520'; 
$grid["loadtext"] = "Завантаження...";
$grid["add_options"] = array('width'=>'620');
$grid["edit_options"] = array('width'=>'620');
$grid["view_options"] = array('width'=>'620'); 

// required for iphone/safari scroll display 
// $grid["height"] = "auto"; 

$g->set_options($grid); 

$col = array(); 
$col["title"] = "№"; // caption of column 
$col["name"] = "id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = false; 
$col["width"] = "30"; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата укладання договору"; // caption of column 
$col["name"] = "adminDateagreement"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["linkoptions"] = "target='_blank'"; // extra params with <a> tag
$col["link"] = ""; 

$col["editable"] = true; 
$col["required"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Орієнтовна дата початку робіт"; // caption of column 
$col["name"] = "adminDateStartWork"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Орієнтовний термін закінчення робіт"; // caption of column 
$col["name"] = "adminDateFinishWork"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$cols[] = $col; 

# Customization of Action column width and other properties
$col = array();
$col["title"] = "Редагування";
$col["name"] = "act";
$col["width"] = "50";
$cols[] = $col;

$g->set_columns($cols); 

$g->set_actions(array( 
        "add"=>true, // allow/disallow add 
        "edit"=>true, // allow/disallow edit 
        "delete"=>true, // allow/disallow delete 
        "clone"=>true, // allow/disallow delete 
        "rowactions"=>true, // show/hide row wise edit/del/save option 
        "search" => "advance", // show single/multi field search condition (e.g. simple or advance) 
        "showhidecolumns" => false 
) 
); 
// render grid 
$out = $g->render("list1"); 


// $themes = array("black-tie","blitzer","cupertino","dark-hive","dot-luv","eggplant","excite-bike","flick","hot-sneaks","humanity","le-frog","mint-choc","overcast","pepper-grinder","redmond","smoothness","south-street","start","sunny","swanky-purse","trontastic","ui-darkness","ui-lightness","vader"); 
// $i = rand(0,8); 

// // if set from page 
// if (is_numeric($_GET["themeid"])) 
//     $i = $_GET["themeid"]; 
// else 
//     $i = 14; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
    <link rel="shortcut icon" href="resource/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="resource/js/themes/redmond/jquery-ui.custom.css"></link>  
	<link  type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' />
    <link rel='stylesheet' type='text/css' href='resource/js/jqgrid/css/ui.jqgrid.css' />	
    <link href="resource/css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resource/css/bootstrap.min.css">
	<script type='text/javascript' src="resource/js/jquery.min.js"></script>
	<script type='text/javascript' src='resourdce/js/themes/jquery-ui.custom.min.js'></script>        
    <script type='text/javascript' src='resource/js/jqgrid/js/i18n/grid.locale-ua.js'></script>
    <script type='text/javascript' src='resource/js/jqgrid/js/jquery.jqGrid.js'></script>
</head>
<body>
<div class="container">
    <div class="row">
            <!-- Menu -->
        <div class="innerMenu">
              <?php Menu() ?>  
        </div>
            <!--content-->
        <div class="content">
                   <div >  
            <?php echo $out?> 
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>