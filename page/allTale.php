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
$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");
$grid["export"] = array("filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape", "paper"=>"a4");
$grid["export"]["paged"] = "1";
$grid["export"]["range"] = "filtered";

$g->set_options($grid); 

$col = array(); 
$col["title"] = "№";  
$col["name"] = "id"; 
$col["editable"] = false; 
$col["width"] = "80"; 
$col["editable"] = false; // this column is not editable 
$col["search"] = true; 
$col["editable"] = true; 
$col["export"] = true; // this column will not be exported 
$cols[] = $col;

$col = array(); 
$col["title"] = "Сайт";  
$col["name"] = "secretarySite";  
$col["editable"] = true; 
$col["width"] = "400";
$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"http://'+cellval+'\">'+cellval+'</a>'; }";
$col["unformat"] = "function(cellval,options,cell){ return $('a', cell).attr('href').replace('http://',''); }";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Форма проведення закупівлі";  
$col["name"] = "secretaryForm";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Адреса обєкту";  
$col["name"] = "secretaryAddres";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Види робіт";  
$col["name"] = "secretaryWork";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Замовник";  
$col["name"] = "secretaryCustomer";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Вартість робіт по оголошенню, тис.грн";  
$col["name"] = "secretaryPrice";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Наша вхідна ціна, тис.грн";  
$col["name"] = "secretaryInputPrice";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія тендерної пропозиції";  
$col["name"] = "secretaryBank";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія виконання дговору";  
$col["name"] = "secretaryBankWork";  
$col["editable"] = true; 
$col["width"] = "200";
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
$col["width"] = "200";
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата аукціону";  
$col["name"] = "secretaryDateAuction";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Результати аукціону";  
$col["name"] = "secretaryResultAction";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Сума перемоги тис.грн";  
$col["name"] = "secretarySumWinner";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col;

$col = array(); 
$col["title"] = "Завантаження докуентів кошторисника для кваліфікації";  
$col["name"] = "calculatorDownloadFile";  
$col["editable"] = true;
$col["width"] = "200";
$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"http://'+cellval+'\">'+cellval+'</a>'; }";
$col["unformat"] = "function(cellval,options,cell){ return $('a', cell).attr('href').replace('http://',''); }"; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Завантаження докуентів для кваліфікації";  
$col["name"] = "lawyerDownloadDocument"; 
$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"http://'+cellval+'\">'+cellval+'</a>'; }";
$col["unformat"] = "function(cellval,options,cell){ return $('a', cell).attr('href').replace('http://',''); }"; 
$col["editable"] = true; 
$col["width"] = "400";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Результати аукціону після кваліфікації";  
$col["name"] = "secretaryResultActionAbout";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Банківська гарантія для заключення дговору";  
$col["name"] = "accountantBankGarant";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 



$col = array(); 
$col["title"] = "Документація для заключення договору";  
$col["name"] = "businessDocumentOver";  
$col["width"] = "200";
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата укладення договору";  
$col["name"] = "adminDateagreement";  
$col["width"] = "200";
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Орієнтовна дата початку робіт";  
$col["name"] = "adminDateStartWork";  
$col["editable"] = true; 
$col["width"] = "200";
$cols[] = $col; 

$col = array(); 
$col["title"] = "Орієнтовний термін закінчення робіт";  
$col["name"] = "adminDateFinishWork"; 
$col["width"] = "200"; 
$col["editable"] = true; 
$cols[] = $col; 

$col = array(); 
$col["title"] = "Дата закриття банківської гарантії тендерної пропозиції";  
$col["name"] = "accountantDateBankGarante"; 
$col["width"] = "200"; 
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
    <link rel="shortcut icon" href="resource/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="resource/js/themes/redmond/jquery-ui.custom.css"></link>  
	<link  type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' />
    <link rel='stylesheet' type='text/css' href='resource/js/jqgrid/css/ui.jqgrid.css' />	
    <link href="resource/css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resource/css/bootstrap.min.css">
      <script src="/resource/js/jquery.min.js"></script>   
    <script src="/resource/js/bootstrap.min.js"></script>
	<script type='text/javascript' src="resource/js/jquery.min.js"></script>
	<script type='text/javascript' src='resourdce/js/themes/jquery-ui.custom.min.js'></script>        
    <script type='text/javascript' src='resource/js/jqgrid/js/i18n/grid.locale-ua.js'></script>
    <script type='text/javascript' src='resource/js/jqgrid/js/jquery.jqGrid.js'></script>
</head>
<body>

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
<?php footer() ?>
