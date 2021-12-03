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


	$fridge = "SELECT * FROM refrigerator
	WHERE name LIKE '" . $_GET["produce"] . "';";

	$results_fridge = $mysqli->query($fridge);
	if (!$results_fridge) {
		echo $mysqli->error;
		exit();
	}

	$row_fridge = $results_fridge->fetch_assoc();

	$results_array = [];

	while( $row = $results_fridge->fetch_assoc()) {
		array_push($results_array, $row_fridge);
	}

	// Convert the assoc array to json string
	echo json_encode($results_array); 

	$sql = "DELETE FROM user_fridge
	WHERE 1=1";

	if( isset($_SESSION["user"]) && !empty($_SESSION["user"]) ) { 
		$sql = $sql . " AND user_id = " . $_SESSION["user"];
		$sql = $sql . " AND produce_id = " . $row_fridge['produce_id'] . ";";

		$results = $mysqli->query($sql);
		if (!$results ) {
			echo $mysqli->error;
			exit();
		}
	}
	

	$mysqli->close();


?>