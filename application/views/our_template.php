 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
	<div>
		<a href='<?php echo site_url('examples/secretary')?>'>Секретарь</a> |
		<a href='<?php echo site_url('examples/adminTable')?>'>Саша (админ)</a> |
		<a href='<?php echo site_url('examples/calculators')?>'>Кошторисник</a> |
		<a href='<?php echo site_url('examples/accountants')?>'>Бухгалтер</a> | 
		<a href='<?php echo site_url('examples/lawyers')?>'>Юрист</a> |		 
		<a href='<?php echo site_url('examples/multigrids')?>'>Повна таюлиця</a> |
		
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html> 
