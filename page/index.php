<?php 
Head('Головна сторінка');
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