<?php
ULogin(1);
 Head('Профіль користувача')?>
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

            <?php

            echo'
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="resource/img/avatar.jpg" alt="Аватар">
      <div class="caption">
        <h3>Профіль</h3>
            <h4>Імя</h4> '.$_SESSION['USER_NAME'].'
            <h4>Дата реєстрації</h4> '.$_SESSION['USER_REGDATE'].'
            <h4>E-Mail</h4> '.$_SESSION['USER_EMAIL'].'
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>Зміна профілю</h3>
            <form method="POST" action="/account/edit">
                <div class="form-group">
                    <label for="password" >Пароль</label>
                    <input type="password" name="opassword" class="form-control" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="не менше 5 і не більше 15 латинських символів або цифр" placeholder="Старий пароль">
                    <input type="password" name="npassword" class="form-control" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="не менше 5 і не більше 15 латинських символів або цифр" placeholder="Новий пароль">
                </div>
                <div class="form-group">
                    <label for="name">Імя</label>
                    <input type="text" class="form-control" name="name"  placeholder="Імя" maxlength="15" pattern="[А-Яа-яЁё]{3,15}" title="не менше 3 і не більше 15 кирилицею символів або цифр" value="'.$_SESSION['USER_NAME'].'" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Аватар</label>
                    <input type="file" id="avatar">
                    <p class="help-block">Завантажте аватар</p>
                </div>
                <input type="submit" name="enter" class="btn btn-success" value="Зберігти">
            </form>
      </div>
    </div>
  </div>
</div>
</div>         
            ';

            ?>

</div>



            

        </div>
            <!--footer-->
        <div class="footer">
            <footer>

            </footer>
        </div>

    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>