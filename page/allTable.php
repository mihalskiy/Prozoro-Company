<?php


include_once "config.php";

include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

$db_conf = array( 	
					"type" 		=> PHPGRID_DBTYPE, 
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
				);

$g = new jqgrid($db_conf); 

$g->table = "office"; 
     
$grid["caption"] = "Уся таблиця"; 
$grid["autowidth"] = true; 
$grid["toolbar"] = "up"; 
$grid["autoresize"] = true; 
$grid["view_options"]["width"]="520"; 
$grid["loadtext"] = "Завантаження...";
$grid["altRows"] = true; 
$grid["toppager"] = true; 


$g->set_options($grid); 

$col = array(); 
$col["title"] = "№";  
$col["name"] = "id"; 
$col["editable"] = false; 
$col["width"] = "30"; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Сайт";  
$col["name"] = "secretarySite";  
$col["editable"] = true; 
$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"http://'+cellval+'\">'+cellval+'</a>'; }";
$col["unformat"] = "function(cellval,options,cell){ return $('a', cell).attr('href').replace('http://',''); }";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Форма проведення закупівлі";  
$col["name"] = "secretaryForm";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Адреса обєкту";  
$col["name"] = "secretaryAddres";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Види робіт";  
$col["name"] = "secretaryWork";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Замовник";  
$col["name"] = "secretaryCustomer";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Вартість робіт по оголошенню, тис.грн";  
$col["name"] = "secretaryPrice";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Наша вхідна ціна, тис.грн";  
$col["name"] = "secretaryInputPrice";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія тендерної пропозиції";  
$col["name"] = "secretaryBank";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія виконання дговору";  
$col["name"] = "secretaryBankWork";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата початку прийому пропозицій";  
$col["name"] = "secretaryDateStart";  
$col["editable"] = true;
$col["datefmt"] = "Y-m-d";
$col["formatter"] = "date";
$col["formatoptions"] = array("srcformat"=>"Y-m-d","newformat"=>"d/m/Y");
$col["formatter"] = "datetime";
$col["formatoptions"] = array("srcformat"=>"Y-m-d","newformat"=>"d/m/Y");
$cols[] = $col;


$col = array(); 
$col["title"] = "Банківська гарантія виконання дговору";  
$col["name"] = "secretaryBankWork";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата передачі пакету документів кошторисником";  
$col["name"] = "calculatorDateTransmission";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата передачі пакету документів юристом";  
$col["name"] = "lawyerDateFile";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата передачі банківської гарантії тендерної пропозиції";  
$col["name"] = "accountantDateTransmission";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата завершення прийому пропозицій";  
$col["name"] = "secretaryDateOver";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата аукціону";  
$col["name"] = "secretaryDateAuction";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Результати аукціону";  
$col["name"] = "secretaryResultAction";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Сума перемоги тис.грн";  
$col["name"] = "secretarySumWinner";  
$col["editable"] = true; 
$cols[] = $col;

$col = array(); 
$col["title"] = "Завантаження докуентів кошторисника для кваліфікації";  
$col["name"] = "calculatorDownloadFile";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Завантаження докуентів для кваліфікації";  
$col["name"] = "lawyerDownloadDocument";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Результати аукціону після кваліфікації";  
$col["name"] = "secretaryResultActionAbout";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія для заключення дговору";  
$col["name"] = "accountantBankGarant";  
$col["editable"] = true; 
$cols[] = $col; 



$col = array(); 
$col["title"] = "Документація для заключення договору";  
$col["name"] = "businessDocumentOver";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата укладення договору";  
$col["name"] = "adminDateagreement";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Орієнтовна дата початку робіт";  
$col["name"] = "adminDateStartWork";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Орієнтовний термін закінчення робіт";  
$col["name"] = "adminDateFinishWork";  
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата закриття банківської гарантії тендерної пропозиції";  
$col["name"] = "accountantDateBankGarante";  
$col["editable"] = true; 
$cols[] = $col; 

$g->set_columns($cols); 

$g->set_actions(array( 
        "add"=>false,  
        "edit"=>false,  
        "delete"=>true,  
        "clone"=>false,  
        "rowactions"=>false,  
        "search" => "advance",  
        "showhidecolumns" => false 
) 
); 
 
$out = $g->render("list1"); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css" />	
    <link href="resource/css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	
	<script type="text/javascript" src="http://www.trirand.com/blog/jqgrid/js/jquery-ui-custom.min.js"></script>        
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/i18n/grid.locale-ua.js"></script>
    <script type="text/javascript" src="http://www.trirand.com/blog/jqgrid/js/jquery.jqGrid.js"></script>
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
<script src="resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>