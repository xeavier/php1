<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
	 header("Location: home.html");
     exit();
}else{
     header("Location: index.html");
     exit();
}
?>