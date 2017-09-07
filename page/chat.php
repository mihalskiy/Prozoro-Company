<?php 
ULogin(1);

if ($_POST['enter'] and $_POST['text']) {
$_POST['text'] = FormChars($_POST['text']);
mysqli_query($CONNECT, "INSERT INTO `chat`  VALUES ('', '$_POST[text]', '$_SESSION[USER_LOGIN]', '$_SESSION[USER_AVATAR]', NOW())");
exit(header('location: /chat'));
}

Head('Чат');
?>
<body>
            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu()?>  
        </div>
            <!--content-->
        <div class="content">
            <div class="row col-md-offset-5">
             <?php  MessageShow() ?>
                <div class="chatBox">
                    <?php
                    //if ($_SESSION['USER_AVATAR'] == 0) $Avatar = 0;
	                //else $Avatar = $_SESSION['USER_AVATAR'].'/'.$_SESSION['USER_ID'];
                    // извлекаем всю тиблицу чат сортировка по времени с лимитом показа сообщений 50
                    $Query = mysqli_query($CONNECT, 'SELECT * FROM `chat` ORDER By `time` DESC LIMIT 50');
                    while ($Row = mysqli_fetch_assoc($Query)) echo  '<div class="chatBlock"><img alt="Brand" class="foto" src="/resource/avatar/'.$Avatar.'.jpg"">'.$Row['avatar'].'<span>|'.$Row['user'].' | '.$Row['time'].'</span>'.$Row['message'].'</div>';
                    ?>
                    
                </div>
            </div>
                <div class="row">                  
                    <div class="container">
                            <form form method="POST" action="/chat" class="col-md-4 col-md-offset-5">
                                <h2 class="form-signin-heading" >Чат</h2>
                                <label for="login" class="sr-only">Логін</label>
                                <textarea  class="form-control ChatMessage" rows="3" name="text" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="не менше 5 і не більше 15 латинських символів або цифр" placeholder="Теск повідомлення ..." required></textarea> 
                                <input type="submit" name="enter" class="btn btn-success" value="Відправити">   
                            </form>
                    </div>                 
                </div>
        </div>

<?php footer() ?>