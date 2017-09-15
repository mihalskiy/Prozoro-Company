<?php
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=prozoro', $username, $password );

include('function.php');
if(isset($_POST["id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM `secretary` 
		WHERE id = '".$_POST["id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["secretarySite"] = $row["secretarySite"];
		$output["secretaryForm"] = $row["secretaryForm"];
		$output["secretaryAddres"] = $row["secretaryAddres"];
		$output["secretaryWork"] = $row["secretaryWork"];
		$output["secretaryCustomer"] = $row["secretaryCustomer"];
		$output["secretaryInputPrice"] = $row["secretaryInputPrice"];
		$output["secretaryBank"] = $row["secretaryBank"];
		$output["secretaryBankWork"] = $row["secretaryBankWork"];
		$output["secretaryDateStart"] = $row["secretaryDateStart"];
		$output["secretaryDateOver"] = $row["secretaryDateOver"];
		$output["secretaryDateAuction"] = $row["secretaryDateAuction"];
		$output["secretaryResultAction"] = $row["secretaryResultAction"];
		$output["secretarySumWinner"] = $row["secretarySumWinner"];
		$output["secretaryResultActionAbout"] = $row["secretaryResultActionAbout"];
		$output["secretaryTimerDay"] = $row["secretaryTimerDay"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>