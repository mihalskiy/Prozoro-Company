<?php
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=prozoro', $username, $password );

include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM `secretary`";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE secretarySite LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryForm LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryAddres LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryWork LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryCustomer LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryInputPrice LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryBank LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryBankWork LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryDateStart LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryDateOver LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryDateAuction LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryResultAction LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretarySumWinner LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryResultActionAbout LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR secretaryTimerDay LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();
	$sub_array[] = $row["id"];
	$sub_array[] = $row["secretarySite"];
	$sub_array[] = $row["secretaryForm"];
	$sub_array[] = $row["secretaryAddres"];
	$sub_array[] = $row["secretaryWork"];
	$sub_array[] = $row["secretaryCustomer"];
	$sub_array[] = $row["secretaryInputPrice"];
	$sub_array[] = $row["secretaryBank"];
	$sub_array[] = $row["secretaryBankWork"];
	$sub_array[] = $row["secretaryDateStart"];
	$sub_array[] = $row["secretaryDateOver"];
	$sub_array[] = $row["secretaryDateAuction"];
	$sub_array[] = $row["secretaryResultAction"];
	$sub_array[] = $row["secretarySumWinner"];
	$sub_array[] = $row["secretaryResultActionAbout"];
	$sub_array[] = $row["secretaryTimerDay"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>