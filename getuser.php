<?php

session_start(); 
include "db_conn.php";

$data = (object)array(); 
$email = $_SESSION['email'];

	$stmt = $conn->prepare("SELECT  email, password, name, phone FROM users WHERE email=?  LIMIT 1");
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$stmt->bind_result($email, $password, $name, $phone);
	$stmt->store_result();
	if($stmt->num_rows == 1)  //To check if the row exists
		{
			if($stmt->fetch()) //fetching the contents of the row
			{
				   $_SESSION['Logged'] = 1;
				   $_SESSION['email'] = $email;
				   $_SESSION['password'] = $password;
				   $_SESSION['name'] = $name;	
				   $data->name = $name;
				   $data->password = $password;
				   $data->email = $email;
				   $data->phone = $phone;
				   echo json_encode($data);
				   exit();
			  
		   }

	}
	

?>