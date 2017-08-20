<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/resource/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <?php include_once 'setting.php'; 
    $query = "SELECT * FROM office";
    $result = mysqli_query($CONNECT, $query);
    ?>
    <table class="table table-bordered">
    <thead>
          <tr>
              <th >№</th>
							<th>Сайт</th>
							<th >Форма проведення закупівлі</th>
							<th >Адреса об'єкту</th>
							<th>Види робіт</th>
							<th >Замовник</th>
							<th>Вартість робіт по оголошенню, тис.грн</th>
							<th>Наша вхідна ціна, тис.грн</th>
							<th>Банківська гарантія тендерної пропозиції</th>
							<th >Банківська гарантія виконання дговору</th>
							<th>Дата початку прийому пропозицій</th>
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
							<th>Дата закриття банківської гарантії тендерної пропозиції</th>
          </tr>
    </thead>
    <tbody>
            <?php 
            while ($row = mysqli_fetch_assoc($result)){
        ?>
      <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['secretarySite']?></td>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/resource/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/resource/js/bootstrap.min.js"></script>
  </body>
</html>