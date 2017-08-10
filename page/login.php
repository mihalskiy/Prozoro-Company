
<?php Head('Вхід в систему')?>
<body>
<div class="container">
    <div class="row">
            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu();
              MessageShow()?>  
        </div>
            <!--content-->
        <div class="content">
            <div class="row">                  
                   <div class="container">
                       <!-- <div class="col-xs-12 col-md-8">
                           <div class="row"><p>dfef</p></div>
                       </div> -->
                        <form form method="POST" action="/account/login" class="col-md-4 col-md-offset-5">
                            <h2 class="form-signin-heading" >Вхід на сайт</h2>
                            <label for="login" class="sr-only">Логін</label>
                            <input type="text" class="form-control" name="login" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="не менше 5 і не більше 15 латинських символів або цифр" placeholder="Логін" required>
                            <label for="password" class="sr-only">Пароль</label>
                            <input type="password" name="password" class="form-control" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="не менше 5 і не більше 15 латинських символів або цифр" placeholder="Пароль" required>
                            <div class="form-group captcha">
                                <span for="captcha">Введіть код перевірки</span>
                                <input type="text" class="form-control clearfix" name="captcha" pattern="[0-9]{1,5}" title="Тільки номера" id="captcha">  
                                <img src="resource/captcha.php" alt="каптча" >
                            </div>
                            <input type="submit" name="enter" class="btn btn-success" value="Вхід">
                            
                        </form>
</div>                 
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>