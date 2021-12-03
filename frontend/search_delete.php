<?php
	
	$host = "303.itpwebdev.com";
	$user = "carolynh_db_user";
	$password = "Ketchup&Mustardew732"; 
	$db = "carolynh_refrigerator_db";

	$mysqli = new mysqli($host, $user, $password, $db);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	session_start();
	var_dump($_SESSION['user']);

	if( isset($_SESSION['user']) && !empty($_SESSION['user'] && $_SESSION['user']) == 1) {

		$sql = "DELETE FROM refrigerator
		WHERE 1=1";

		if( isset($_GET["produce_id"]) && !empty($_GET["produce_id"]) ) { 
			$sql = $sql . " AND produce_id = " . $_GET["produce_id"] . ";";
		}

		$results = $mysqli->query($sql);
		if (!$results ) {
			echo $mysqli->error;
			exit();
		}

	}

	$mysqli->close();

?>