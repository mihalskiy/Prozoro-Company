<?php

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
$grid["form"]["position"] = "center";
$grid["add_options"] = array('width'=>'620');
$grid["edit_options"] = array('width'=>'620');
$grid["view_options"] = array('width'=>'620'); 
$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");
$grid["export"] = array("filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape", "paper"=>"a4");



// required for iphone/safari scroll display 
// $grid["height"] = "auto"; 

$g->set_options($grid); 

$col = array(); 
$col["title"] = "№"; // caption of column 
$col["name"] = "id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = false; 
$col["width"] = "30";
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Сайт"; // caption of column 
$col["name"] = "secretarySite"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"http://'+cellval+'\">'+cellval+'</a>'; }";
$col["unformat"] = "function(cellval,options,cell){ return $('a', cell).attr('href').replace('http://',''); }";
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Форма проведення закупівлі"; // caption of column 
$col["name"] = "secretaryForm"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Адреса об'єкту"; // caption of column 
$col["name"] = "secretaryAddres"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["edittype"] = "textarea"; // render as textarea on edit 
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 



$col = array(); 
$col["title"] = "Види робіт"; // caption of column 
$col["name"] = "secretaryWork"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Замовник"; // caption of column 
$col["name"] = "secretaryCustomer"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Наша вхідна ціна, тис.грн"; // caption of column 
$col["name"] = "secretaryInputPrice"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true;
$col["formatter"] = "number"; 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія тендерної пропозиції"; // caption of column 
$col["name"] = "secretaryBank"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["formatoptions"]["op"] = "bw";
$col["edittype"] = "checkbox"; 
$col["editoptions"] = array("value"=>"Так:НІ"); 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія виконання дговору"; // caption of column 
$col["name"] = "secretaryBankWork"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true;
$col["edittype"] = "checkbox"; 
$col["editoptions"] = array("value"=>"Так:НІ");
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата початку прийому пропозицій"; // caption of column 
$col["name"] = "secretaryDateStart"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true;
$col["search"] = false;
$col["export"] = true;
$cols[] = $col;

$col = array(); 
$col["title"] = "Дата завершення прийому пропозицій"; // caption of column 
$col["name"] = "secretaryDateOver"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата акціону"; // caption of column 
$col["name"] = "secretaryDateAuction"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true;
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Результати акціону"; // caption of column 
$col["name"] = "secretaryResultAction"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Сума перемоги тис.грн"; // caption of column 
$col["name"] = "secretarySumWinner"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
$col["export"] = true;
$cols[] = $col; 

$col = array(); 
$col["title"] = "Результати ауккціону після кваліфікації"; // caption of column 
$col["name"] = "secretaryResultActionAbout"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias) 
$col["editable"] = true; 
$col["search"] = false;
$col["export"] = true;
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
        "import"=>true,
        "rowactions"=>true, // show/hide row wise edit/del/save option 
        "search" => "advance", // show single/multi field search condition (e.g. simple or advance) 
        "showhidecolumns" => false 
) 
); 
// render grid 
$out = $g->render("list1"); 


// $themes = array("black-tie","blitzer","cupertino","dark-hive","dot-luv","eggplant","excite-bike","flick","hot-sneaks","humanity","le-frog","mint-choc","overcast","pepper-grinder","redmond","smoothness","south-street","start","sunny","swanky-purse","trontastic","ui-darkness","ui-lightness","vader"); 
// $i = rand(0,8); 
// custom on_export callback function
function custom_export($param)
{
    $sql = $param["sql"]; // the SQL statement for export
    $grid = $param["grid"]; // the complete grid object reference

    if ($grid->options["export"]["format"] == "xls")
    {
        // excel generate code goes here
    }
    else if ($grid->options["export"]["format"] == "pdf")
    {
        // pdf generate code goes here
    }
}
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
        <div class="innerMenu ">
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


</body>
</html>