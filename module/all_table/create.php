<?php

$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=prozoro', $username, $password );


  $post = $_POST;

//   $sql = "INSERT INTO secretary (secretarySite, secretaryForm) 

// 	VALUES ('".$post['secretarySite']."','".$post['secretaryForm']."')";

//   $result = $mysqli->query($sql);

  //$sql = "SELECT * FROM secretary Order by id desc LIMIT 1"; 

  //$result = $mysqli->query($sql);

  $data = $result->fetch_assoc();

echo json_encode($data);

?>