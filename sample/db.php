<?php
	$servername='localhost';
	$username='root';
	$password='';
	$dbname = "users";
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	  	if(!$conn){
			die('Could not Connect MySql Server:' .mysqli_error($conn));
		}
?>