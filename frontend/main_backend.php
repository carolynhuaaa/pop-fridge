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
	
	if( isset($_SESSION["user"]) && !empty($_SESSION["user"]) ) { 

		$sql = "SELECT categories.name as category, date_expired, refrigerator.name as produce, refrigerator.produce_id as produce_id, fridge_id
		FROM user_fridge
		LEFT JOIN refrigerator
			ON user_fridge.produce_id = refrigerator.produce_id
		JOIN categories 
			ON categories.category_id = refrigerator.category_id
		WHERE user_fridge.user_id LIKE '%" . $_GET["user"] . "%'";

		$results = $mysqli->query($sql);
		if ( !$results ) {
			echo $mysqli->error;
			exit();
		}

		$results_array = [];

		while( $row = $results->fetch_assoc()) {
			array_push($results_array, $row);
		}

		// Convert the assoc array to json string
		echo json_encode($results_array);
	}

	$mysqli->close();


?>