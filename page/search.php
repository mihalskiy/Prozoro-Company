<?php 
ULogin(1);

if ($_POST['enter'] and $_POST['text']) {
$_POST['text'] = FormChars($_POST['text']);
mysqli_query($CONNECT, "INSERT INTO `chat`  VALUES ('', '$_POST[text]', '$_SESSION[USER_LOGIN]', NOW())");
exit(header('location: /chat'));
}

Head('Чат');
?>
<body>
<div class="container">
    <div class="row">
            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu()?>  
        </div>
            <!--content-->
        <div class="content">
            <div class="row col-md-offset-5">
             <?php  MessageShow() ?>
            </div>
                <div class="row">                  
                    <div class="container">
                            <form form method="POST" action="/chat"  class="form-inline">
                                <div class="form-group">
                                    <label for="inputPassword2" class="sr-only">Password</label>
                                    <input type="text" name="text" placehodlder="" require>>
                                </div>
                                <input type="submit" name="enter" class="btn btn-success" value="Пошук">
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

<?php footer() ?>