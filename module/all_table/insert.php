<?php
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=prozoro', $username, $password );

include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO `secretary`(`secretarySite`, `secretaryForm`, `secretaryAddres`, `secretaryWork`, `secretaryCustomer`, `secretaryInputPrice`, `secretaryBank`, `secretaryBankWork`, `secretaryDateStart`, `secretaryDateOver`, `secretaryDateAuction`, `secretaryResultAction`, `secretarySumWinner`, `secretaryResultActionAbout`, `secretaryTimerDay`) 
							VALUES (:secretarySite, :secretaryForm, :secretaryAddres, :secretaryWork, :secretaryCustomer, :secretaryInputPrice, :secretaryBank, :secretaryBankWork, :secretaryDateStart, :secretaryDateOver, :secretaryDateAuction, :secretaryResultAction, :secretarySumWinner, :secretaryResultActionAbout, :secretaryTimerDay)
		");
		$result = $statement->execute(
			array(
				':secretarySite'	=>	$_POST["secretarySite"],
				':secretaryForm'	=>	$_POST["secretaryForm"],
				':secretaryAddres'	=>	$_POST["secretaryAddres"],
				':secretaryWork'	=>	$_POST["secretaryWork"],
				':secretaryCustomer'	=>	$_POST["secretaryCustomer"],
				':secretaryInputPrice'	=>	$_POST["secretaryInputPrice"],
				':secretaryBank'	=>	$_POST["secretaryBank"],
				':secretaryBankWork'	=>	$_POST["secretaryBankWork"],
				':secretaryDateStart'	=>	$_POST["secretaryDateStart"],
				':secretaryDateOver'	=>	$_POST["secretaryDateOver"],
				':secretaryDateAuction'	=>	$_POST["secretaryDateAuction"],
				':secretaryResultAction'	=>	$_POST["secretaryResultAction"],
				':secretarySumWinner'	=>	$_POST["secretarySumWinner"],
				':secretaryResultActionAbout'	=>	$_POST["secretaryResultActionAbout"],
				':secretaryTimerDay'	=>	$_POST["secretaryTimerDay"]
			)
		);
		if(!empty($result))
		{
			echo 'Дані успішно внесені в базу';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE secretary 
			SET secretarySite = :secretarySite, secretaryForm = :secretaryForm, secretaryAddres = :secretaryAddres, secretaryWork = :secretaryWork, secretaryCustomer = :secretaryCustomer, secretaryInputPrice = :secretaryInputPrice, 
			secretaryBank = :secretaryBank, secretaryBankWork = :secretaryBankWork, secretaryDateStart = :secretaryDateStart, secretaryDateOver = :secretaryDateOver, secretaryDateAuction = :secretaryDateAuction,
			secretaryResultAction = :secretaryResultAction, secretarySumWinner = :secretarySumWinner, secretaryResultActionAbout = :secretaryResultActionAbout, secretaryTimerDay = :secretaryTimerDay
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':secretarySite'	=>	$_POST["secretarySite"],
				':secretaryForm'	=>	$_POST["secretaryForm"],
				':secretaryAddres'	=>	$_POST["secretaryAddres"],
				':secretaryWork'	=>	$_POST["secretaryWork"],
				':secretaryCustomer'	=>	$_POST["secretaryCustomer"],
				':secretaryInputPrice'	=>	$_POST["secretaryInputPrice"],
				':secretaryBank'	=>	$_POST["secretaryBank"],
				':secretaryBankWork'	=>	$_POST["secretaryBankWork"],
				':secretaryDateStart'	=>	$_POST["secretaryDateStart"],
				':secretaryDateOver'	=>	$_POST["secretaryDateOver"],
				':secretaryDateAuction'	=>	$_POST["secretaryDateAuction"],
				':secretaryResultAction'	=>	$_POST["secretaryResultAction"],
				':secretarySumWinner'	=>	$_POST["secretarySumWinner"],
				':secretaryResultActionAbout'	=>	$_POST["secretaryResultActionAbout"],
				':secretaryTimerDay'	=>	$_POST["secretaryTimerDay"],
				':id'			=>	$_POST["id"]
			)
		);
		if(!empty($result))
		{
			echo 'Дані змінено';
		}
	}
}

?>