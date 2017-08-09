<?php Head('Сторінка Реєстрації')?>
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
                   
                   <div class="container ">
        <div class="registerForm">
            <h2> Сторінка реєстрації</h2>
            <form method="POST" action="/account/register">
                <div class="form-group">
                    <label for="login">логін</label>
                    <input type="text" class="form-control" name="login" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="не менше 5 і не більше 15 латинських символів або цифр" placeholder="Логін" required>
                </div>
                <div class="form-group">
                    <label for="email">Email адреса</label>
                    <input type="email" class="form-control" name="email"  placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password" >Пароль</label>
                    <input type="password" name="password" class="form-control" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="не менше 5 і не більше 15 латинських символів або цифр" placeholder="Пароль" required>
                </div>
                <div class="form-group">
                    <label for="name">Імя</label>
                    <input type="text" class="form-control" name="name"  placeholder="Імя" maxlength="15" pattern="[А-Яа-яЁё]{3,15}" title="не менше 3 і не більше 15 кирилицею символів або цифр" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Аватар</label>
                    <input type="file" id="avatar">
                    <p class="help-block">Завантажте аватар</p>
                </div>
                <div class="form-group captcha">
                    <span for="captcha">Введіть код перевірки</span>
                    <input type="text" class="form-control clearfix" name="captcha" pattern="[0-9]{1,5}" title="Тільки номера" id="captcha">  
                    <img src="resource/captcha.php" alt="каптча" >
                </div>
                <input type="submit" name="enter" class="btn btn-success" value="Регистрация">
            </form>
        </div>
    </div>
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
