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

	if( isset($_GET["term"]) && !empty($_GET["term"]) ) { 
		
		$sql = "SELECT refrigerator.name as produce, expire_days, categories.name as category, refrigerator.produce_id as produce_id
		FROM refrigerator
		LEFT JOIN categories 
			ON categories.category_id = refrigerator.category_id
		WHERE refrigerator.name LIKE '%" . $_GET["term"] . "%' ";


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