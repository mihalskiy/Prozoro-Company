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
            <h4>Імя</h4> '.$_SESSION['USER_NAME'].'
            <h4>Дата реєстрації</h4> '.$_SESSION['USER_REGDATE'].'
            <h4>E-Mail</h4> '.$_SESSION['USER_EMAIL'].'
            <h4>Аватар</h4> '.$_SESSION['USER_AVATAR'].'

            ';
            ?>
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