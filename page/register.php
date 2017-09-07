<?php 
ULogin(0);
Head('Сторінка Реєстрації')?>
<body>
<div class="container">
            <!-- Menu -->
        <div class="innerMenu">
              <?php Menu()?>  
        </div>
            <!--content-->
        <div class="content">
            <div class="row">
                    <?php  MessageShow() ?>
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
                <div class="form-group captcha">
                    <span for="captcha">Введіть код перевірки</span>
                    <input type="text" class="form-control clearfix" name="captcha" pattern="[0-9]{1,5}" title="Тільки номера" id="captcha">  
                    <img src="resource/captcha.php" alt="каптча" >
                </div>
                <input type="submit" name="enter" class="btn btn-success" value="Реєстрація">
            </form>
        </div>
    </div>
</div>

            </div>

        </div>

</div>

<?php footer() ?>
