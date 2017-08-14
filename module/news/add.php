<?php
if ($_SESSION['USER_GROUP'] == 2) $Active = 1;
else $Active = 0;

// если наши платформи зареестр то будем виполнять таки запросси
if ($_POST['enter'] and $_POST['text'] and $_POST['name']  and $_POST['cat']) {
    $_POST['name'] = FormChars($_POST['name']);
    $_POST['name'] = FormChars($_POST['name']);
    // = number
    $_POST['cat'] += 0;
// витяговаем данние 
mysqli_query($CONNECT, "INSERT INTO `news`  VALUES ('', '$_POST[name]', $_POST[cat], 0, '$_SESSION[USER_LOGIN]', '$_POST[text]',  NOW(), $Active)");
MessageSend(3, 'Новина добавлена', '/news');
}

Head('Додати новини')?>
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
            <h2> Добавити новину</h2>
            <form method="POST" action="/news/add">
                <div class="form-group">
                    <label for="name">Назва новини</label>
                    <input type="text" class="form-control" name="name"  placeholder="Назва новини" required>
                </div>
                <div class="form-group">
                    <label for="login">Виберіть каегорію</label>
                    <select class="form-control" name="cat">
                        <option value="1">Каегорія 1</option>
                        <option value="2">Каегорія 2</option>
                        <option value="3">Каегорія 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="login">Текст новини</label>
                    <textarea name="text" class="form-control" rows="3"  placeholder="текст..." required></textarea>
                </div>
                <input type="submit" name="enter" class="btn btn-success" value="Опоблікувати">
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
