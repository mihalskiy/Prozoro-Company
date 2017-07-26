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

$grid["caption"] = "Sample Grid";
$g->set_options($grid);
$g->table = "secretary, admin";


$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css' />
    <link rel='stylesheet' type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' />	
 
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	
	<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery-ui-custom.min.js'></script>        
    <script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js'></script>
    <script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery.jqGrid.js'></script>
</head>
<body>
<script>
	function validate_onblur(o)
	{
		if (o.value < 20)
		{
			$('#FormError>td').html('Must be greater than 20'); $('#FormError').show();	
			$(o).css('borderColor','red');
			setTimeout(function(){$(o).focus()}, 10);
		}
		else
		{
			$('#FormError>td').html(''); $('#FormError').hide();	
			$(o).css('borderColor','');
		}
	}
	
	function my_validation(value,label)
	{
		if (value > 100)
			return [true,""];
		else
			return [false,label+": Should be greater than 100"];
	}
	</script>
	<div style="margin:10px">
	<?php echo $out?>
</body>
</html>