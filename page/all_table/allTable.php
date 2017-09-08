<?php
include('setting.php');

//for total count data
$countSql = "SELECT COUNT(id) FROM secretary
            LEFT JOIN admin ON (secretary.id = admin.id_admin)
                LEFT JOIN business ON (secretary.id = business.id_business)
                LEFT JOIN calculator ON (secretary.id = calculator.id_calculator)
                LEFT JOIN accountant ON (secretary.id = accountant.id_accountant)
                LEFT JOIN lawyer ON (secretary.id = lawyer.id_lawyer)";  
$tot_result = mysqli_query($CONNECT, $countSql);   
$row = mysqli_fetch_row($tot_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

//for first time load data
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
$sql = "SELECT * FROM secretary 
                LEFT JOIN admin ON (secretary.id = admin.id_admin)
                LEFT JOIN business ON (secretary.id = business.id_business)
                LEFT JOIN calculator ON (secretary.id = calculator.id_calculator)
                LEFT JOIN accountant ON (secretary.id = accountant.id_accountant)
                LEFT JOIN lawyer ON (secretary.id = lawyer.id_lawyer) ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($CONNECT, $sql); 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="dist/simplePagination.css" />
<script src="dist/jquery.simplePagination.js"></script>
<title></title>
<script>
</script>
</head>
<body>
<div class="container" style="padding-top:20px;">
<table class="table table-bordered table-striped">  
<thead>  
                        <tr>  
                            <th >№</th>
							<th style="background:#d9edf7;">Сайт</th>
							<th style="background:#d9edf7;">Форма проведення закупівлі</th>
							<th style="background:#d9edf7;">Адреса об'єкту</th>
							<th style="background:#d9edf7;">Види робіт</th>
							<th style="background:#d9edf7;">Замовник</th>
							<th style="background:#d9edf7;">Наша вхідна ціна, тис.грн</th>
							<th class="logick"style="background:#d9edf7;">Банківська гарантія тендерної пропозиції</th>
							<th style="background:#d9edf7;">Банківська гарантія виконання дговору</th>
                            <th style="background:#d9edf7;">Дата початку прийому пропозицій</th>
							<th style="background:#d9edf7;">Дата завершення прийому пропозицій</th>
							<th style="background:#d9edf7;">Дата аукціону</th>
							<th style="background:#d9edf7;">Результати аукціону</th>
							<th style="background:#d9edf7;">Сума перемоги тис.грн</th>
							<th style="background:#ebebeb;">Завантаження докуентів кошторисника для кваліфікації</th>
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
<tbody id="target-content">
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {
?>  
            <tr>  
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['secretarySite']?></a></td>
                <td><?php echo $row['secretaryForm']?></td>
                <td><?php echo $row['secretaryAddres']?></td>
                <td><?php echo $row['secretaryWork']?></td>
                <td><?php echo $row['secretaryCustomer']?></td>
                <td><?php echo $row['secretaryInputPrice']?></td>
                <td><?php echo $row['secretaryBank']?></td>
                <td><?php echo $row['secretaryBankWork']?></td>
                <td><?php echo $row['secretaryDateStart']?></td>
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
            </tr>  
<?php  
};  
?>
</tbody> 
</table>
<nav><ul class="pagination">
<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
            if($i == 1):?>
            <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
            <?php else:?>
            <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
        <?php endif;?>          
<?php endfor;endif;?>
</ul></nav>
</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : 1,
		onPageClick : function(pageNumber) {
			jQuery("#target-content").html('loading...');
			jQuery("#target-content").load("pagination.php?page=" + pageNumber);
		}
    });
});
</script>