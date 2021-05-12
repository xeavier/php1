<?php


session_start(); 
include "db_conn.php";

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_SESSION['email'];
	$stmt = $conn->prepare("UPDATE users SET name=?, phone=? WHERE email=?");
	$stmt->bind_param('sss', $name, $phone, $email);
	$stmt->execute();

/* Execute the prepared Statement */
   $status = $stmt->execute();
/* BK: always check whether the execute() succeeded */
if ($status === false) {
  echo 1;
}
echo 0;
//printf("%d Row inserted.\n", $stmt->affected_rows);

?>