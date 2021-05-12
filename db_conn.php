<?php

/*$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "final_1";*/

/*$sname= "remotemysql.com";
$unmae= "WBQV1AlAAP";
$password = "3HYQvwc7CG";
$db_name = "WBQV1AlAAP";*/

$sname= "freedb.tech";
$unmae= "freedbtech_banuchandar";
$password = "12345678";
$db_name = "freedbtech_guvi";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	//echo "Connection failed!";
}else{
	//echo "Connected!";
}