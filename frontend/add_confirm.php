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

		$insert = $mysqli->prepare("INSERT INTO refrigerator SET name = ?, category_id = ?, expire_days = ?");

		// all are required
		if ( isset($_POST['item-name']) && !empty($_POST['item-name']) && 
			 isset($_POST['category']) && !empty($_POST['category']) &&
			 isset($_POST['expire']) && !empty($_POST['expire']) ) {


			// now check for if it already exists in database
			$sql = "SELECT * FROM refrigerator
			WHERE name LIKE '" . $_POST['item-name'] . "';";
			$results = $mysqli->query($sql);

			if ( $results == false ) { // if it exists
				$isInserted = false;
				$exist = true;
			}

			else { // if it doesn't exist

				$insert->bind_param("sii", $_POST['item-name'], $_POST['category'], $_POST['expire']);
				$executed = $insert->execute();
				$exist = false;
				if(!$executed) {
					echo $mysqli->error;
				}

				if($mysqli->affected_rows == 1) {
					$isInserted = true;
				}
			}

		}

		else {
			$error = "Please fill out ALL fields.";
			$isInserted = false;
			$exist = false;
		}	

	}

	else {
		$guest = "As a guest, you cannot add to our database. Please register for an account!";
		$isInserted = false;
		$exist = false;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title> Add Item </title>

	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.typekit.net/kxb7vcn.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	 <link rel="stylesheet" href="style.css">

	 <style>

	 	@media (max-width: 767px) {

	 		.paragraph {
	 			width: 100%;
	 		}

	 		.container {
	 			width: 100%;
	 			padding-top: 4%;
	 			padding-bottom: 4%;
	 		}

	 		label {
	 			margin-left: auto;
	 			margin-right: auto;
	 			width: 100%;
	 		}

	 		.name {
	 			width: 100%;
	 		}

	 		body {
		 		margin-top: 45px;
		 		background-image: url("images/frame.png");
		 		background-size: 100%;
	 		}

		 	img {
		 		width: 40px;
		 		position: absolute;
		 		left: 19%;
		 		top: 8%;
		 		background-color: white;
		 		border-radius: 100%;
		 	}

	 	}


	 	body {
	 		margin-top: 85px;
	 		background-image: url("images/frame.png");
	 		background-size: 100%;
	 	}

	 	img {
	 		width: 40px;
	 		position: absolute;
	 		left: 19%;
	 		top: 10%;
	 		background-color: white;
	 		border-radius: 100%;
	 	}

	 	.container {
	 		width: 60%;
	 		margin-left: auto;
	 		margin-right: auto;
	 		text-align: center;
	 		align-content: center;
	 		border: 2px solid black;
	 		background-color: white;
	 		padding: 4%;
	 		box-shadow: 10px 10px black;
	 	}

	 	h1, label {
	 		font-family: aktiv-grotesk-extended, sans-serif;
			font-style: normal;
			font-weight: 700;
	 	}

	 	.paragraph {
	 		text-align: center;
	 	}

	 	p {
	 		font-family: aktiv-grotesk, sans-serif;
			font-style: normal;
			font-weight: 300;
			font-size: 13px;
	 	}

	 	.name {
	 		margin-left: auto;
	 		margin-right: auto;
	 		width: 50%;
	 	}

	 	#item-name {
	 		border: 1px solid black;
			border-radius: 30px;
	 	}

		#expire {
			width: 20%;
		}

		.submit {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 700;
			font-style: normal;
		}

	 </style>

</head>
<body>

	<a href="search.php"><img id="back" class="exit" src="images/x_button.png" alt="x-button"></a>

	<div class="container">
		<h1> Add an Item </h1>
		<div class="paragraph">

			<!-- ERROR -->
			<?php if(isset($error) && !empty($error)): ?>
				<div class="text-danger font-italic">
					<?php echo $error; ?>
				</div>
				<div class="submit">
					<br>
      				<button type="button" class="black-button" onclick="window.location.href='add.php';"> try again </button>
				</div> 
			<?php endif;?>

			<?php if( $exist ): ?>
				<div class="text-danger font-italic"><span class="font-italic"><?php echo $_POST["item-name"]?></span> already exists. </div>
				<div class="submit">
					<br>
      				<button type="button" class="black-button" onclick="window.location.href='add.php';"> try again </button>
				</div> 
			<?php endif;?>

			<!-- SUCCESSFUL -->
			<?php if( $isInserted ): ?>
				<div class="text-success"><span class="font-italic"><?php echo $_POST["item-name"]?></span> was successfully added. </div>
				<p> You've successfully added a produce item to our data base! <br> Now anyone can add it to their pop fridge. </p>
			<?php endif; ?>

			<!-- GUEST -->
			<?php if(isset($guest) && !empty($guest)): ?>
				<div class="text-danger font-italic">
					<?php echo $guest; ?>
				</div>
				<div class="submit">
	      			<button type="button" class="black-button" onclick="window.location.href='register.php';"> register </button>
				</div> 
			<?php endif; ?>
			
		</div>

      	<div class="submit">
      		<br>
      		<button type="button" class="black-button" onclick="window.location.href='main.php';"> back to my pop fridge </button>
		</div> 

	</div> <!-- end of container -->



</body>
</html>