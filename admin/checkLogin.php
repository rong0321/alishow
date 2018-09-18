<?php 

session_start();

if(!$_SESSION['userInfo']){
	header("location:login.php");
}








 ?>