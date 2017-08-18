<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="resource/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
$('#example').dataTable( {
 "aProcessing": true,
 "aServerSide": true,
"ajax": "server-response.php",
} );
} );

</script>
<?php Head('Уся таблиця')?>
<body class="dt-example">
<div class="container">
    <div class="row">
            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu();
              MessageShow()?>   
        </div>
            <!--content-->
        <div class="content">

<table id="example" class="display" cellspacing="0" width="100%">
<thead>
<tr>
<th data-column-id="id" data-type="numeric" data-identifier="true">№</th>
					<th data-column-id="secretarySite" width="50px">Сайт</th>
					<th data-column-id="secretaryForm">Форма проведення закупівлі</th>
					<th data-column-id="secretaryAddres">Адреса обєкту</th>
                    <th data-column-id="secretaryWork">Види робіт</th>
                    <th data-column-id="secretaryCustomer">Замовник</th>
                    <th data-column-id="secretaryPrice">Вартість робіт по оголошенню, тис.грн</th>
                    <th data-column-id="secretaryInputPrice">Наша вхідна ціна, тис.грн</th>
                    <th data-column-id="secretaryBank">Банківська гарантія тендерної пропозиції</th>
                    <th data-column-id="secretaryBankWork">Банківська гарантія виконання дговору</th>
                    <th data-column-id="secretaryDateStart">Дата початку прийому пропозицій</th>
                    <th data-column-id="secretaryBankWork">Банківська гарантія виконання дговору</th>
                    <th data-column-id="calculatorDateTransmission">Дата передачі пакету документів кошторисником</th>
                    <th data-column-id="lawyerDateFile">Дата передачі пакету документів юристом</th>
                    <th data-column-id="accountantDateTransmission">Дата передачі банківської гарантії тендерної пропозиції</th>
                    <th data-column-id="secretaryDateOver">Дата завершення прийому пропозицій</th>
                    <th data-column-id="secretaryDateAuction">Дата аукціону</th>
                    <th data-column-id="secretaryResultAction">Результати аукціону</th>
                    <th data-column-id="secretarySumWinner">Сума перемоги тис.грн</th>
                    <th data-column-id="calculatorDownloadFile">Завантаження докуентів кошторисника для кваліфікації</th>
                    <th data-column-id="lawyerDownloadDocument">Завантаження докуентів для кваліфікації</th>
                    <th data-column-id="secretaryResultActionAbout">Результати аукціону після кваліфікації</th>
                    <th data-column-id="accountantBankGarant">Банківська гарантія для заключення дговору</th>
                    <th data-column-id="businessDocumentOver">Документація для заключення договору</th>
                    <th data-column-id="adminDateagreement">Дата укладення договору</th>
                    <th data-column-id="adminDateStartWork">Орієнтовна дата початку робіт</th>
                    <th data-column-id="adminDateFinishWork">Орієнтовний термін закінчення робіт</th>
                    <th data-column-id="accountantDateBankGarante">Дата закриття банківської гарантії тендерної пропозиції</th>
</tr>
</thead>
</table>
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="resource/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="resource/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>