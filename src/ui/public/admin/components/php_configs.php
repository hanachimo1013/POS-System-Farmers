<?php
	$conn = new mysqli('localhost', 'root', '', 'pos');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>
