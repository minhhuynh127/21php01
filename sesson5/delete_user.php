<?php 
	$connect = new mysqli('localhost', 'root', '', 'my_username');

	// Check connection
	if ($connect->connect_error) {
	    die("Connection failed: " . $connect->connect_error);
	} else {
		$id_delete = $_GET['id'];
		echo $id_delete;
		$query = "DELETE FROM username WHERE id = $id_delete";
		$connect->query($query);
		header('Location: list_username.php');
	}

	