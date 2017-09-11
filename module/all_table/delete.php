<?php

include('setting.php');
include("function.php");

if(isset($_POST["id"]))
{
	$image = get_image_name($_POST["id"]);
	if($image != '')
	{
		unlink("upload/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM secretary WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Дані успішно видалені з бази';
	}
}



?>