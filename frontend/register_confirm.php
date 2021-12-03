<?php

	$host = "303.itpwebdev.com";
	$user = "carolynh_db_user"; //from cPanel
	$password = "Ketchup&Mustardew732"; //from cPanel
	$db = "carolynh_refrigerator_db";

	if ( !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['firstname']) || empty($_POST['firstname'])
	|| !isset($_POST['username']) || empty($_POST['username'])
	|| !isset($_POST['password']) || empty($_POST['password']) ) {
		$error = "Please fill out all required fields.";
	}

	else {

		// Connect to DB
		$mysqli = new mysqli($host, $user, $password, $db);// Check for errors

		if( $mysqli->connect_errno){
			echo $mysqli->connect_error;
			exit();
		}

		// Check if username or email address is already taken (aka exists in the users table)
		$sql_registered = "SELECT * FROM users 
		WHERE username = '" . $_POST["username"] . 
		"' OR email = '" . $_POST["email"] . "';";

		$results_registered = $mysqli->query($sql_registered);
		if(!$results_registered) {
			echo $mysqli->error;
			exit();
		}

		// num_rows is the # of matches
		if($results_registered->num_rows > 0) {
			$error = "Username or email has been already taken. Please choose another one.";
		}

		else {

			// Hash the password
			$password = hash("sha256", $_POST["password"]);

			// INSERT INTO the user table
			$sql = "INSERT INTO users(firstname, username, email, password) 
			VALUES('" . $_POST["firstname"] . "','" . $_POST["username"] . "','" . $_POST["email"] . "','" . $password . "');";

			$results = $mysqli->query($sql);
			if(!$results) {
				echo $mysqli->error;
				exit();
			}
		}

		$mysqli->close();
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

	 		.first-name {
	 			width: 100%;
	 		}

	 		body {
		 		background-image: url("images/register.png");
		 		background-size: 100%;
	 		}

		 	#back {
		 		width: 40px;
		 		position: absolute;
		 		left: 19%;
		 		top: 8%;
		 		background-color: white;
		 		border-radius: 100%;
		 	}

	 	}


	 	body {
	 		background-image: url("images/register.png");
	 		background-size: 100%;
	 	}

	 	#back {
	 		width: 40px;
	 		position: absolute;
	 		left: 19%;
	 		top: 15%;
	 		background-color: white;
	 		border-radius: 55%;
	 	}

	 	.container {
	 		width: 60%;
	 		margin-left: auto;
	 		margin-right: auto;
	 		margin-top: 4%;
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
	 		width: 80%;
	 		margin-right: auto;
	 		margin-left: auto;
	 	}

	 	p {
	 		font-family: aktiv-grotesk, sans-serif;
			font-style: normal;
			font-weight: 300;
			font-size: 13px;
	 	}

		#logoimg {
			width: 25%;
		}

		.text-success, .text-danger {
			font-family: aktiv-grotesk, sans-serif;
			font-style: normal;
			font-weight: 200;
		}

	 </style>

</head>
<body>


	<?php include 'nav.php'; ?>

	<div class="container">
		<h1> Register </h1>
		<div class="paragraph">
			<p> With this new account, we can create and store your pop fridge items in our database! We just need a few things from you. </p>
		</div>
		
		<div class="row">
			<div class="col-12">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
					<div class="text-success">
						<?php echo $_POST['firstname'];?> (@<?php echo $_POST['username']; ?>) was successfully registered. <br>
						Log back in to start adding items to your very own pop fridge!
					</div>
				<?php endif; ?>
			</div> <!-- .col -->
		</div> <!-- .row -->

		<br>

		<button type="button" class="black-button" onclick="window.location.href='index.php';"> Log In </button>

	</div> <!-- end of container -->

</body>
</html>