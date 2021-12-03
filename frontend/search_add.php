<?php

	session_start();
	
	$host = "303.itpwebdev.com";
	$user = "carolynh_db_user";
	$password = "Ketchup&Mustardew732"; 
	$db = "carolynh_refrigerator_db";

	$mysqli = new mysqli($host, $user, $password, $db);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	$sql = "SELECT * FROM refrigerator
	WHERE name LIKE '" . $_GET["produce"] . "';";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	$row = $results->fetch_assoc();

	if( isset($_SESSION['user']) && !empty($_SESSION['user']) ) {

		$insert = $mysqli->prepare("INSERT INTO user_fridge SET user_id = ?, produce_id = ?, date_added = ?, date_expired = ?");

		$today = date("Y-m-d"); 
		$expire = new DateTime($today);
		$add = 'P' . $row["expire_days"] . "D";
		$interval = new DateInterval($add);
		$expire->add($interval);	
		$output = $expire->format("Y-m-d");

		$insert->bind_param("iiss", $_SESSION['user'], $row["produce_id"], $today, $output);
		$executed = $insert->execute();

		if(!$executed) {
			echo $mysqli->error;
		}
	}

	$results_array = [];

	while( $row = $results->fetch_assoc()) {
		array_push($results_array, $row);
	}

	// Convert the assoc array to json string
	echo json_encode($results_array); 


	$mysqli->close();

?>