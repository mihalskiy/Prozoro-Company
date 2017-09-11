<?php
ULogin(1);
 Head('Профіль користувача')?>
<body>
            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu()?>  
        </div>
            <!--content-->
        <div class="content">
 <?php  MessageShow() ?>
            <?php
if ($_SESSION['USER_AVATAR'] == 0) $Avatar = 0;
else $Avatar = $_SESSION['USER_AVATAR'].'/'.$_SESSION['USER_ID'];
            echo'
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="resource/avatar/'.$Avatar.'.jpg" alt="Аватар">
      <div class="caption">
        <h3>Профіль</h3>
            <h4>Імя</h4> '.$_SESSION['USER_NAME'].' ('.userGroup($_SESSION['USER_GROUP']).')
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
            <form method="POST" action="/account/edit" enctype="multipart/form-data">
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
                    <input type="file" name="avatar">
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

<?php footer() ?>