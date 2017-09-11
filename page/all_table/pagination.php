<?php
include('setting.php');
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