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
                   
                   <div class="container">
    <div class="wrapper">
        <div class="registerForm">
            <h1> Сторінка реєстрації</h1>
            <form method='POST' action='/register'>

                <div class="form-group .col-md-4">
                    <label for="login">логін</label>
                    <input type="login" class="form-control" id="login" placeholder="Логін" required>
                </div>
                <div class="form-group">
                    <label for="Email1">Email адреса</label>
                    <input type="email" class="form-control" id="Email1" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="Password1" >Пароль</label>
                    <input type="password" class="form-control" id="Password1" placeholder="Пароль" required>
                </div>
                <div class="form-group">
                    <label for="name">Імя</label>
                    <input type="name" class="form-control" id="name" placeholder="Імя" required>
                </div>
                <button type="submit" class="btn btn-default">Реєстрація</button>
            <form>
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
