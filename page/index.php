<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="resource/css/bootstrap.min.css">
  <script src="resource/js/jquery.min.js"></script>
  <script src="resource/js/bootstrap.min.js"></script>
</head>
<body>
<?php
  if ($_SESSION['USER_LOGIN_IN'] != 1) $Menu = '<ul class="nav navbar-nav navbar-right"><li class="nav-item"><a class="nav-link" href="/register"><span class="glyphicon glyphicon-log-in"></span> Реєстрація</a></li><li class="nav-item"><a class="nav-link" href="/login"><span class="glyphicon glyphicon-user"></span> Вхід</a></li><li class="nav-item"><a class="nav-link" href="/restore">Відновити пароль</a></li></ul>';
	else  $Menu = '<div class="collapse navbar-collapse" id="myNavbar"><ul class="nav navbar-nav"><li><a href="#"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>Файли</a></li>         <li><a href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Таблиці</a></li><li><a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>Чат</a></li></ul><ul class="nav navbar-nav navbar-right"><li><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>Повідомлення</a></li><li class="dropdown"><a href="#" class="dropdown-toggle navbar-brand " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img alt="Brand" class="foto" src="/resource/avatar/'.$Avatar.'.jpg""></a><ul class="dropdown-menu"><li><a href="/profile">Мій профіль</a></li><li><li role="separator" class="divider"></li><li><a href="/account/logout">Вийти</a></li></ul>';
    echo '<nav class="navbar navbar-inverse"><div class="container-fluid"><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"><span class="icon-bar"></span><span class="icon-bar"></span<span class="icon-bar"></span></button><a class="navbar-brand" href="/"><img alt="Brand" src="/resource/img/bg.png" width="132px" height="47px"></a></div>'.$Menu.'</div></nav>';

?>
<!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav> -->
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
      <h3>Test</h3>
      <p>Lorem ipsum...</p>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
