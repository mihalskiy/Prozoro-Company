<?php 
Head('Новини');
?>
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
          <ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="/news">Усі категорії</a></li>
  <li role="presentation"><a href="/news/category/id/1">Категорія 1</a></li>
  <li role="presentation"><a href="/news/category/id/2">Категорія 2</a></li>
  <li role="presentation"><a href="/news/category/id/3">Категорія 3</a></li>
</ul>
<div class="pageNews">
    <?php
       
     echo 'Новина: '.$Param['id'];
     
    ?>
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
<script src="/resource/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>