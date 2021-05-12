<?php

include "db_conn.php";
// Create connection
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, phone FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
    $fp = fopen('data.json', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);
 } 
else {
  echo "0 results";
}
$conn->close();
?>