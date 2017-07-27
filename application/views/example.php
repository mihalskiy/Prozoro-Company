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
 
 <link rel="shortcut icon" href="/resource/img/logo.ico" type="image/x-icon">
<link href="/resource/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/resource/css/style.css" type="text/css" rel="stylesheet"> 



</head>
<body>
	<div class="container">
    	<div class="row">
			<div class="innerMenu">
				<div class="navbar">
					<nav class="navbar navbar-inverse">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="#"><img alt="Brand" src="/resource/img/logo.png" width="115px" height="115px"></a>
								</div>
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav">
										<li class="active"><a href="/index.php">Головна <span class="sr-only">(current)</span></a></li>
										<li><a href="#">Календарь</a></li>
										<li><a href="/secretary">Графіки робіт</a></li>
										<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Учасники <span class="caret"></span></a>
										<ul class="dropdown-menu"><li><a href='<?php echo site_url('examples/secretary')?>'>Секретарь</a></li>
										<li><a href='<?php echo site_url('examples/adminTable')?>'>Саша (админ)</a></li>
										<li><a href='<?php echo site_url('examples/calculators')?>'>Кошторисник</a> </li>
										<li role="separator" class="divider"></li>
										<li><a href='<?php echo site_url('examples/accountants')?>'>Бухгалтер</a></li><li role="separator" class="divider"></li>
										<li><a href='<?php echo site_url('examples/lawyers')?>'>Юрист</a></li>
										</ul></li></ul>
									<ul class="nav navbar-nav navbar-right">
										<li><a href="/register">Реєстрація</a></li>
										<li><a href="/login">Війти в систему</a></li>
									</ul>
						</div>
					</nav>
				</div>
			</div>
	<div class="content">

            <div style='height:20px;'></div>
    		<div>
				<?php echo $output; ?>
			</div>
	<div class="footer">
        <div class="row">
            <footer>

            </footer>
        </div>
    </div>

    </div>
</div>	
 <script src="/resource/js/bootstrap.js" type="text/javascript"></script> 
<!-- <script src="/resource/js/jquery.js" ></script> -->
</body>
</html>
