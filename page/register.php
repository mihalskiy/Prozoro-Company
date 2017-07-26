<?php


?>



<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<title> Сторінка Реєстрації Prozoro-Company</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style type="text/css">
        <? include "resource/css/style.css" ?>
    </style>

</head>


<body>
<style>


</style>

<div class="container">
    <div class="wrapper">
        <div class="registerForm">
            <h1> Сторінка реєстрації</h1>
            <form method='POST' action='/register'>

                <div class="form-group .col-md-4">
                    <label for="login">логін</label>
                    <input type="login" class="form-control" id="login" placeholder="Логін" required>
                </div>
                <div class="form-group">
                    <label for="Email1">Email адреса</label>
                    <input type="email" class="form-control" id="Email1" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="Password1" >Пароль</label>
                    <input type="password" class="form-control" id="Password1" placeholder="Пароль" required>
                </div>
                <div class="form-group">
                    <label for="name">Імя</label>
                    <input type="name" class="form-control" id="name" placeholder="Імя" required>
                </div>
                <button type="submit" class="btn btn-default">Реєстрація</button>
            <form>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>