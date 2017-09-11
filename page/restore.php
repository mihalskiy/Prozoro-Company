
<?php 
ULogin(0);
Head('Відновлення паролю')?>
<body>
            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu() ?>  
        </div>
            <!--content-->
        <div class="content ">
            <div class="row">  
                           
                   <div class="container">
                   <?php  MessageShow() ?> 
                       <!-- <div class="col-xs-12 col-md-8">
                           <div class="row"><p>dfef</p></div>
                       </div> -->
                        <form form method="POST" action="/account/restore" class="col-md-4 col-md-offset-4">
                            <h2 class="form-signin-heading" >Відновлення паролю</h2>
                            <div class="form-group">
                                <label for="login" class="sr-only">Логін</label>
                                <input type="text" class="form-control" name="login" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="не менше 5 і не більше 15 латинських символів або цифр" placeholder="Логін" required>  
                            </div>
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

<?php footer() ?>