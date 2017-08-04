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
     
$grid["caption"] = "Секретарь"; 
$grid["autowidth"] = true; 
$grid["toolbar"] = "up"; 
$grid["autoresize"] = true; // responsive effect 
$grid["view_options"]['width']='520'; 
$grid["shrinkToFit"] = true;
$grid["autowidth"] = true; 
$grid["loadtext"] = "Завантаження...";
$grid["add_options"] = array('width'=>'420');
$grid["edit_options"] = array('width'=>'420');
$grid["view_options"] = array('width'=>'420');


// required for iphone/safari scroll display 
// $grid["height"] = "auto"; 

$g->set_options($grid); 

$col = array(); 
$col["title"] = "№"; // caption of column 
$col["name"] = "id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = false; 
$col["width"] = "30";
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Сайт"; // caption of column 
$col["name"] = "secretarySite"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"http://'+cellval+'\">'+cellval+'</a>'; }";
$col["unformat"] = "function(cellval,options,cell){ return $('a', cell).attr('href').replace('http://',''); }";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Форма проведення закупівлі"; // caption of column 
$col["name"] = "secretaryForm"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Адреса об'єкту"; // caption of column 
$col["name"] = "secretaryAddres"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 



$col = array(); 
$col["title"] = "Види робіт"; // caption of column 
$col["name"] = "secretaryWork"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Замовник"; // caption of column 
$col["name"] = "secretaryCustomer"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Вартість робіт по оголошенню, тис.грн"; // caption of column 
$col["name"] = "secretaryPrice"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Наша вхідна ціна, тис.грн"; // caption of column 
$col["name"] = "secretaryInputPrice"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true;
$col["formatter"] = "number"; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія тендерної пропозиції"; // caption of column 
$col["name"] = "secretaryBank"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія виконання дговору"; // caption of column 
$col["name"] = "secretaryBankWork"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата початку прийому пропозицій"; // caption of column 
$col["name"] = "secretaryDateStart"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true;
$col["datefmt"] = "Y-m-d";
$col["formatter"] = "date";
$col["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'d/m/Y');
$col["formatter"] = "datetime";
$col["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'d/m/Y');
$col["search"] = false;

$cols[] = $col;

$col = array(); 
$col["title"] = "Дата завершення прийому пропозицій"; // caption of column 
$col["name"] = "secretaryDateOver"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата акціону"; // caption of column 
$col["name"] = "secretaryDateAuction"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true;
$col["formatter"] = "datetime";
$col["formatoptions"] = array("srcformat"=>'Y-m-d',"newformat"=>'d/m/Y');
$col["searchoptions"]["sopt"] = array("cn");
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Результати акціону"; // caption of column 
$col["name"] = "secretaryResultAction"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Сума перемоги тис.грн"; // caption of column 
$col["name"] = "secretarySumWinner"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;

$cols[] = $col; 

$col = array(); 
$col["title"] = "Результати ауккціону після кваліфікації"; // caption of column 
$col["name"] = "secretaryResultActionAbout"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
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
	<link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css' />
    <link rel='stylesheet' type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' />	
    <link href="resource/css/style.css" type="text/css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	
	<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery-ui-custom.min.js'></script>        
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/i18n/grid.locale-ua.js'></script>
    <script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery.jqGrid.js'></script>
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
        <div> 
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

<script>
function edit_as_radio(o)
{
    setTimeout(function(){
        jQuery(o).hide();
        jQuery(o).parent().append('<input title="0" type="radio" name="rd_closed" value="0" onclick="jQuery(\'#total\').val(0);"/> 0 <input title="5" type="radio" name="rd_closed" value="5" onclick="jQuery(\'#total\').val(5);"/> 5 <input title="10" type="radio" name="rd_closed" value="10" onclick="jQuery(\'#total\').val(10);"/> 10');
    },100);
}
</script>

</body>
</html>