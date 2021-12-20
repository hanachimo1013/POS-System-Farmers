<?php
	$conn = new mysqli('localhost', 'adminDB', 'db_userAdmin', 'votesystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>
