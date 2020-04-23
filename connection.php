<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database_name = "carrental";

	$conn = new mysqli($servername,$username,$password,$database_name);

	if($conn->connect_error){
		die("connection failed" . $conn->connect_error);
	}
	

?>