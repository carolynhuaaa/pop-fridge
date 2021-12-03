<?php

	$host = "303.itpwebdev.com";
	$user = "carolynh_db_user"; //from cPanel
	$password = "Ketchup&Mustardew732"; //from cPanel
	$db = "carolynh_refrigerator_db";

	session_start();

	// If no user is logged in, do the usual things. Otherwise, redirect user out of this page.
	if( !isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {

		// Check if user has entered in username/password
		if ( isset($_POST['username']) && isset($_POST['password']) ) {
			// User did not enter username/password, it's blank
			if ( empty($_POST['username']) || empty($_POST['password']) ) { $error = "Please enter username and password.";}

			else {
				// User did enter username/password but need to check if the username/pw combination is correct
				$mysqli = new mysqli($host, $user, $password, $db);// Check for errors

				if( $mysqli->connect_errno){
					echo $mysqli->connect_error;
					exit();
				}

				// Hash whatever user typed in for password, then compare this to the hashed password in the DB
				$passwordInput = hash("sha256", $_POST["password"]);

				$sql = "SELECT * FROM users
							WHERE username = '" . $_POST['username'] . "' AND password = '" . $passwordInput . "';";
				
				$results = $mysqli->query($sql);

				if(!$results) {
					echo $mysqli->error;
					exit();
				}

				// If we get 1 result back, means username/pw combination is correct.
				if($results->num_rows > 0) {
					// Set session variables to remember this user
					$_SESSION["username"] = $_POST["username"];
					$get = $results->fetch_assoc();
					$_SESSION["firstname"] = $get["firstname"];
					$_SESSION["user"] = $get["user_id"];
					$_SESSION["logged_in"] = true;
					session_start();

					// Success! Redirect user to the home page
					header("Location: main.php");
			
				}
				else {
					$error = "Invalid username or password.";
				}
			} 
		}
	}
	// Redirect logged in user to home
	else {
		header("Location: index.php");
	}
?>
 
<!DOCTYPE html>
<html>
<head>
	<title> Login Page</title>

	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.typekit.net/kxb7vcn.css">
	<link rel="stylesheet" href="style.css">

	<style>


		/* Phone size */
		@media (max-width: 767px) {

			.back {
				width: 180%;
				margin-left: -5%;
			}

			.container{	
				padding: 2%;
				border: 3px solid black;
				width: 60%;
				background-color: #ffffff;
				margin-left: auto;
				margin-right: auto;
				text-align: center;
				vertical-align: center;

				position: absolute;
	  			top: 20%;
	  			left: 20%;
			}

		}

		/* Tablet size */
		@media (min-width: 768px) {

			.back {
				width: 110%;
			}

			.container{	
			padding: 2%;
			border: 3px solid black;
			width: 40%;
			background-color: #ffffff;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			vertical-align: center;

			position: absolute;
  			top: 20%;
  			left: 30%;

			}
		}

		/* Desktop size */
		@media (min-width: 992px) {

			.back {
				width: 100%;
    		}

			.container{	
				padding: 2%;
				border: 3px solid black;
				width: 30%;
				background-color: #ffffff;
				margin-left: auto;
				margin-right: auto;
				text-align: center;
				vertical-align: center;

				position: absolute;
	  			top: 20%;
	  			left: 35%;
			}

		}

		body {
			overflow: hidden;
			background-color: white;
		}

		.normal {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 700;
			font-style: normal;
		}

		.title, .submit, label {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 600;
			font-style: normal;
		}

		p {
			font-family: aktiv-grotesk, sans-serif;
			font-weight: 100;
			font-style: normal;
			color: red;
		}

		#username, #password {
	 		border: 1px solid black;
			border-radius: 30px;
		}


	</style>

</head>
<body>

	<?php include 'nav.php'; ?>

    <img class="back" src="images/index.png">
		<div class="container">
			<h1 class="title"> Log In </h1>	 
		    	<div class="row justify-content-center">     
			        <div class="align-self-center">
			          	<form class="login-form" action="index.php" method="POST"> 
			            	<div class="form-group">
			              		<small id="login-error"></small>
			            	</div>
			            	<div class="form-group"> 
			              		<label for="username">Username</label>
			              		<input id="username" name="username" type="text" class="form-control"/>
			              		<small id="username-error" class="invalid-feedback">Please enter a username!</small>
			            	</div>
			            	<div class="form-group"> 
			              		<label for="password">Password</label>
			              		<input id="password" name="password" type="password" class="form-control"/> 
			              		<small id="password-error" class="invalid-feedback">Please enter a password!</small>
			            	</div>

			            	<p><?php
								if ( isset($error) && !empty($error) ) { echo $error;}
							?></p>

			            	<div class="row">
			              		<div class="col text-center">
			                		<button type="submit" class="submit btn black-button"> Sign In </button>
			                	</div> 
			              	</div>
			          	</form>
			        </div>   
				</div>
		
		<br>

		<h6 class="title"> Don't have an account? </h6>
		<div>
			<button type="button" class="pill" onclick="window.location.href='register.php';"> Register </button>
		</div>

		<div class="normal"> or </div>

		<div>
			<button type="button" class="pill" onclick="window.location.href='main.php';"> Sign in as Guest </button>
		</div>
	</div>



	<script>
      // Client-side input validation:
      document.querySelector('form').onsubmit = function(){
        // If login-error is currently displayed, clear it.
        document.querySelector("#login-error").innerHTML = "";

        if (document.querySelector('#username').value.trim().length == 0) {
          document.querySelector('#username').classList.add('is-invalid');
        } else {
          document.querySelector('#username').classList.remove('is-invalid');
        }

        if (document.querySelector('#password').value.trim().length == 0) {
          document.querySelector('#password').classList.add('is-invalid');
        } else {
          document.querySelector('#password').classList.remove('is-invalid');
        }

        return (!document.querySelectorAll('.is-invalid').length > 0);
      }
    </script>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>	