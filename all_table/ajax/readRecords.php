<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th data-column-id="id" data-type="numeric" data-identifier="true">№</th>
							<th data-column-id="secretarySite">Сайт</th>
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
						</tr>';

	$query = "SELECT * FROM office";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['secretarySite'].'</td>
				<td>'.$row['secretaryForm'].'</td>
				<td>'.$row['secretaryAddres'].'</td>
				<td>'.$row['secretaryWork'].'</td>
				<td>'.$row['secretaryCustomer'].'</td>
				<td>'.$row['secretaryPrice'].'</td>
				<td>'.$row['secretaryInputPrice'].'</td>
				<td>'.$row['secretaryBank'].'</td>
				<td>'.$row['secretaryBankWork'].'</td>
				<td>'.$row['secretaryDateStart'].'</td>
				<td>'.$row['secretaryBankWork'].'</td>
				<td>'.$row['calculatorDateTransmission'].'</td>
				<td>'.$row['lawyerDateFile'].'</td>
				<td>'.$row['accountantDateTransmission'].'</td>
				<td>'.$row['secretaryDateOver'].'</td>
				<td>'.$row['secretaryDateAuction'].'</td>
				<td>'.$row['secretaryResultAction'].'</td>
				<td>'.$row['secretarySumWinner'].'</td>
				<td>'.$row['calculatorDownloadFile'].'</td>
				<td>'.$row['lawyerDownloadDocument'].'</td>
				<td>'.$row['secretaryResultActionAbout'].'</td>
				<td>'.$row['accountantBankGarant'].'</td>
				<td>'.$row['businessDocumentOver'].'</td>
				<td>'.$row['adminDateagreement'].'</td>
				<td>'.$row['adminDateStartWork'].'</td>
				<td>'.$row['adminDateFinishWork'].'</td>
				<td>'.$row['accountantDateBankGarante'].'</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>