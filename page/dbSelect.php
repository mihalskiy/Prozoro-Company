<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

include_once "config.php";

// set up DB 
$db_conf = array(); 
$db_conf["type"] = "mysqli"; // mysql,oci8(for oracle),mssql,postgres,sybase 
$db_conf["server"] = PHPGRID_DBHOST; 
$db_conf["user"] = PHPGRID_DBUSER; 
$db_conf["password"] = PHPGRID_DBPASS; 
$db_conf["database"] = PHPGRID_DBNAME; 

// put tables not to be shown in table editor 
$restricted_tables = array(); 
$allowed_tables = array(); 

include(PHPGRID_LIBPATH."inc/adodb/adodb.inc.php");
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");
session_start(); 

// load table array 
$con = ADONewConnection($db_conf["type"]); 
$con->Connect($db_conf["server"], $db_conf["user"], $db_conf["password"], $db_conf["database"]); 
$result = $con->Execute("SHOW TABLES"); 
$table_arr = $result->GetRows(); 

$tab_fields = array(); 
if (!empty($_POST["tables"])) 
{ 
    $sql = "SELECT * FROM {$_POST["tables"]} LIMIT 1 OFFSET 0"; 
    $result = $con->Execute($sql); 

    $cnt = $result->FieldCount(); 
    $str = ''; 
     
    for ($x=0; $x<$cnt; $x++) 
    { 
        $fld = $result->FetchField($x); 
        $str .= "<option>{$fld->name}</option>"; 
        $tab_fields[] = $fld->name; 
    }         

    if (!empty($_POST["ajax"])) 
        die($str); 
} 

// preserve selection for ajax call 
if (!empty($_POST["tables"])) 
{ 
    $_SESSION["tab"] = $_POST["tables"]; 
    $_SESSION["fields"] = $_POST["fields"]; 
    $tab = $_SESSION["tab"]; 
    $fields = $_SESSION["fields"]; 
} 

// update on ajax call 
if (!empty($_GET["grid_id"])) 
{ 
    $tab = $_SESSION["tab"]; 
    $fields = $_SESSION["fields"]; 
} 

$g = new jqgrid($db_conf); 

if (!empty($tab)) 
{ 
    // set few params 
    $grid["caption"] = "Таблиця '$tab'"; 
    $grid["autowidth"] = true; 
    $grid["multiselect"] = true; 
    $grid["resizable"] = true; 
    $g->set_options($grid); 

    // set database table for CRUD operations 
    $g->table = $tab; 
     
    if (!empty($fields)) 
    { 
        $flds = $fields; 
     
        $cols = array(); 
        foreach($flds as $f) 
        { 
            $col = array(); 
            $col["title"] = ucwords(str_replace("_"," ",$f)); 
            $col["name"] = $f; 
            $col["editable"] = true; 
            $cols[] = $col; 

            
        } 
        
        $g->set_columns($cols); 
    } 

    
     
    $g->set_actions(array(     
                            "add"=>false, // allow/disallow add 
                            "edit"=>true, // allow/disallow edit 
                            "delete"=>true, // allow/disallow delete 
                            "bulkedit"=>true, // allow/disallow delete 
                            "showhidecolumns"=>true, // allow/disallow delete 
                            "rowactions"=>true, // show/hide row wise edit/del/save option 
                            "autofilter" => true, // show/hide autofilter for search 
                            "search" => "advance" 
                        )  
                    ); 

    // render grid 
    $out = $g->render("list1_$tab"); 
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
    <link rel="shortcut icon" href="resource/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="resource/css/jquery-ui.custom.css"></link>
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

     <!-- Multiple Select --> 
    <link href="http://wenzhixin.net.cn/p/multiple-select/multiple-select.css" rel="stylesheet" /> 
    <script src="http://wenzhixin.net.cn/p/multiple-select/jquery.multiple.select.js"></script>     
    <title>.: PHP Grid :. <?php echo ucwords($tab) ?></title> 
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
                  
                  <style>* {font-family: "Open Sans", tahoma;}</style> 
    <form method="post"> 
        <fieldset> 
        <legend>Таблиця Бази Даних</legend> 
        Вибір бази:  
        <select name="tables" onchange="get_fields();" style="width:200px;"> 
            <?php 
                $arr = $table_arr; 
                foreach($arr as $rs) 
                {  
                    if (!empty($restricted_tables) && in_array($rs[0],$restricted_tables)) 
                        continue; 

                    if (!empty($allowed_tables) && !in_array($rs[0],$allowed_tables)) 
                        continue; 
                         
                    $sel = (($rs[0] == $_POST["tables"])?"selected":""); 
                ?> 
                    <option <?php echo $sel?>><?php echo $rs[0]?></option> 
                <?php 
                } 
            ?> 
        </select> 
         
        <select multiple="multiple" id="fields" name="fields[]" style="width:200px;"> 
            <?php  
            foreach($tab_fields as $f)  
            {  
                if (in_array($f,$_POST["fields"])) 
                    $sel = 'selected="selected"'; 
                else 
                    $sel = ''; 
            ?> 
                <option <?php echo $sel?>><?php echo $f?></option> 
            <?php  
            }  
            ?> 
        </select> 
         
        <script> 
         
        function get_fields() 
        { 
            var request = {}; 
            request.tables = jQuery("select[name=tables]").val(); 
            request.ajax = 1; 
            jQuery.ajax({ 
                        url: "", 
                        dataType: 'html', 
                        data: request, 
                        type: 'POST', 
                        error: function(res, status) { 
                            alert(res.status+' : '+res.statusText+'. Status: '+status); 
                        }, 
                        success: function( data ) { 
                                jQuery('select[id=fields]').html(data); 

                                jQuery("select[id=fields]").multipleSelect({ 
                                    filter: true, 
                                    placeholder: 'Select Fields' 
                                }); 
                                 
                                jQuery("select[id=fields]").multipleSelect("checkAll"); 
                        } 
                    }); 
             
        } 
         
        $("select[name=tables]").multipleSelect({ 
            filter: true, 
            single: true, 
            placeholder: 'Select Table' 
        });     
         
        $("select[id=fields]").multipleSelect({ 
            filter: true, 
            placeholder: 'Select Fields' 
        });         
         
        </script> 
        <input type="submit" value="Завантажити вибране"> 
        </fieldset> 
    </form> 
    <?php if (!empty($out)) { ?> 
    <br> 
    <fieldset> 
        <?php echo $out?> 
    </fieldset>     
    <?php } ?> 

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