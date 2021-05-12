<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    include "db_conn.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $email = $_SESSION['email'];

		$stmt = $conn->prepare("SELECT password FROM users WHERE password=? LIMIT 1");
		$stmt->bind_param('s', $op);
		$stmt->execute();
		$stmt->bind_result($password);
		$stmt->store_result();
		if($stmt->num_rows == 1)  //To check if the row exists
			{
				if($op !== $password){
					if($stmt->fetch()) //fetching the contents of the row
					{
						
						$stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");	
						$stmt->bind_param('ss', $np, $email);
						$stmt->execute();
					   $status = $stmt->execute();
					   echo 0;//updated
					if ($status === false) {
					  echo 1;//not update
					}
					  
				   }
				}
	
		}else {
			echo 2;//old password not valid;
		}

    
}else{
	echo 3;//old password is worong
	//header("Location: change-password.php");
	//exit();
}

}else{
	echo "Location: index.html";
     //header("Location: index.php");
     //exit();
}