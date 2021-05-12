<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$phone = validate($_POST['phone']);

	$user_data = 'email='. $email. '&name='. $name;

	// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);
		$stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows > 0) //To check if the row exists
		{
			echo "The email is taken try another"; //The email is taken try another
	
		}/*else {
			echo "INVALID USERNAME/PASSWORD Combination!";
		}*/
		$stmt->close();

		if (mysqli_num_rows($result) > 0) {
			//echo 2;// The email is taken try another"
			//header("Location: signup.php?error=The username is taken try another&$user_data");
	        //exit();
		}else {
			$query = "INSERT INTO users (email, password, name, phone) VALUES(?, ?, ?, ?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('ssss', $email, $pass, $name, $phone);
            if($stmt->execute()){
				 echo 0;
			}else{
				//die('Error : ('. $db->errno .') '. $db->error);
				echo "Try again";
			}
			$stmt->close();
			
		}
	
}else{
	header("Location: signup.php");
	exit();
}