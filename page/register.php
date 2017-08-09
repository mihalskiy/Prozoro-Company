<?php Head('Сторінка Реєстрації')?>
<body>
<div class="container">
    <div class="row">
            <!-- Menu -->
        <div class="innerMenu">
              <?php Menu() ?>  
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
                    <input type="text" class="form-control" name="login"  placeholder="Логін" >
                </div>
                <div class="form-group">
                    <label for="email">Email адреса</label>
                    <input type="email" class="form-control" name="email"  placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password" >Пароль</label>
                    <input type="password" name="password" class="form-control"  placeholder="Пароль" required>
                </div>
                <div class="form-group">
                    <label for="name">Імя</label>
                    <input type="text" class="form-control" name="name"  placeholder="Імя" required>
                </div>
                  <div class="form-group">
                    <label for="avatar">Аватар</label>
                    <input type="file" id="avatar">
                    <p class="help-block">Завантажте аватар</p>
                </div>
                <input type="submit" name="enter" class="btn btn-primary" value="Регистрация">
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
