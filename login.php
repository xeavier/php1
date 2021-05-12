<?php 
session_start(); 
include "db_conn.php";

$errors = [];
$data = [];

if (isset($_POST['email']) && isset($_POST['password'])) {
	
		$email = $_POST['email'];
		$password = $_POST['password'];
	    function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	
		// hashing the password
        $pass = md5($password);

		$stmt = $conn->prepare("SELECT  id, email, password, name FROM users WHERE email=? AND password=? LIMIT 1");
		$stmt->bind_param('ss', $email, $pass);
		$stmt->execute();
		$stmt->bind_result($id, $email, $pass, $name);
		$stmt->store_result();
		if($stmt->num_rows == 1)  //To check if the row exists
			{
				if($stmt->fetch()) //fetching the contents of the row
				{
					
					   $_SESSION['id'] = $id;
					   $_SESSION['email'] = $email;
					   $_SESSION['password'] = $password;
					   $_SESSION['name'] = $name;
					   echo 0;
					   exit();
				  
			   }
	
		}else {
			echo 1; //"INVALID USERNAME/PASSWORD Combination!"
		}
		$stmt->close();
	
	
}
?>