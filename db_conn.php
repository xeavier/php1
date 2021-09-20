<?php

/*$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "final_1";*/

/*$sname= "remotemysql.com";
$unmae= "WBQV1AlAAP";
$password = "3HYQvwc7CG";
$db_name = "WBQV1AlAAP";*/

$sname= "sql10.freesqldatabase.com";
$unmae= "sql10438681";
$password = "tM6BKVxar2";
$db_name = "sql10438681";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	//echo "Connection failed!";
}else{
	//echo "Connected!";
}
