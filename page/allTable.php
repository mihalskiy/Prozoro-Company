<?php Head('Уся таблиця')?>
<body>

            <!-- Menu -->
        <div class="innerMenu">
            <?php Menu();
              MessageShow()?>   
        </div>
            <!--content-->
        <div class="content">
    
    <?php include_once 'setting.php'; 
    $query = "SELECT * FROM office ORDER By id DESC LIMIT 20";
    $result = mysqli_query($CONNECT, $query);
?>
<div   class="allTable">
    <table class="table table-bordered">
    <thead>
          <tr>
              <th >№</th>
							<th style="background:#d9edf7;">Сайт</th>
							<th style="background:#d9edf7;">Форма проведення закупівлі</th>
							<th style="background:#d9edf7;">Адреса об'єкту</th>
							<th style="background:#d9edf7;">Види робіт</th>
							<th style="background:#d9edf7;">Замовник</th>
							<th style="background:#d9edf7;">Вартість робіт по оголошенню, тис.грн</th>
							<th style="background:#d9edf7;">Наша вхідна ціна, тис.грн</th>
							<th style="background:#d9edf7;">Банківська гарантія тендерної пропозиції</th>
							<th style="background:#d9edf7;">Банківська гарантія виконання дговору</th>
              <th style="background:#d9edf7;">Дата початку прийому пропозицій</th>
							<th style="background:#bf7f7f;">Дата передачі пакету документів кошторисником</th>
							<th style="background:#0dc16c;">Дата передачі пакету документів юристом</th>
							<th style="background:#dee182;">Дата передачі банківської гарантії тендерної пропозиції</th>
							<th style="background:#d9edf7;">Дата завершення прийому пропозицій</th>
							<th style="background:#d9edf7;">Дата аукціону</th>
							<th style="background:#d9edf7;">Результати аукціону</th>
							<th style="background:#d9edf7;">Сума перемоги тис.грн</th>
							<th style="background:#bf7f7f;">Завантаження докуентів кошторисника для кваліфікації</th>
							<th style="background:#0dc16c;">Завантаження докуентів для кваліфікації</th>
							<th style="background:#d9edf7;">Результати аукціону після кваліфікації</th>
							<th style="background:#dee182;">Банківська гарантія для заключення дговору</th>
							<th style="background:#fabf8f;">Документація для заключення договору</th>
							<th style="background:#74b194;">Дата укладення договору</th>
							<th style="background:#74b194;">Орієнтовна дата початку робіт</th>
							<th style="background:#74b194;">Орієнтовний термін закінчення робіт</th>
							<th style="background:#dee182;">Дата закриття банківської гарантії тендерної пропозиції</th>
          </tr>
    </thead>
    <tbody>
            <?php 
            while ($row = mysqli_fetch_assoc($result)){
        ?>
      <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['secretarySite']?></a></td>
                <td><?php echo $row['secretaryForm']?></td>
                <td><?php echo $row['secretaryAddres']?></td>
                <td><?php echo $row['secretaryWork']?></td>
                <td><?php echo $row['secretaryCustomer']?></td>
                <td><?php echo $row['secretaryPrice']?></td>
                <td><?php echo $row['secretaryInputPrice']?></td>
                <td><?php echo $row['secretaryBank']?></td>
                <td><?php echo $row['secretaryBankWork']?></td>
                <td><?php echo $row['secretaryDateStart']?></td>
                <td><?php echo $row['calculatorDateTransmission']?></td>
                <td><?php echo $row['lawyerDateFile']?></td>
                <td><?php echo $row['accountantDateTransmission']?></td>
                <td><?php echo $row['secretaryDateOver']?></td>
                <td><?php echo $row['secretaryDateAuction']?></td>
                <td><?php echo $row['secretaryResultAction']?></td>
                <td><?php echo $row['secretarySumWinner']?></td>
                <td><?php echo $row['calculatorDownloadFile']?></td>
                <td><?php echo $row['lawyerDownloadDocument']?></td>
                <td><?php echo $row['secretaryResultActionAbout']?></td>
                <td><?php echo $row['accountantBankGarant']?></td>
                <td><?php echo $row['businessDocumentOver']?></td>
                <td><?php echo $row['adminDateagreement']?></td>
                <td><?php echo $row['adminDateStartWork']?></td>
                <td><?php echo $row['adminDateFinishWork']?></td>
                <td><?php echo $row['accountantDateBankGarante']?></td>
        <?php
            }
        mysqli_close($CONNECT);
        ?>
        </tr>
    </tbody>
    </table>
</div>
        </div>

<?php footer() ?>