<?php

	$host = "303.itpwebdev.com";
	$user = "carolynh_db_user"; //from cPanel
	$password = "Ketchup&Mustardew732"; //from cPanel
	$db = "carolynh_refrigerator_db";

	$mysqli = new mysqli($host, $user, $password, $db);// Check for errors

	if( $mysqli->connect_errno){
		echo $mysqli->connect_error;
		exit();
	}

	// Set character set
	$mysqli->set_charset("utf8");

	$mysqli->close();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title> Register Page </title>

	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.typekit.net/kxb7vcn.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	 <link rel="stylesheet" href="style.css">


	 <style>

	 	/* Phone size */
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

		 	#back {
		 		width: 40px;
		 		position: absolute;
		 		left: 19%;
		 		top: 17%;
		 		background-color: white;
		 		border-radius: 100%;
		 	}

		 	p {
		 		font-family: aktiv-grotesk, sans-serif;
				font-style: normal;
				font-weight: 300;
				font-size: 11px;
		 	}

		 	.form-control {
		 		margin-left: auto;
		 		margin-right: auto;
		 		width: 90%;
		 	}


	 	}

	 	/* Tablet size */
		@media (min-width: 768px) {
			#back {
		 		width: 40px;
		 		position: absolute;
		 		left: 19%;
		 		top: 12%;
		 		background-color: white;
		 		border-radius: 55%;
		 	}

		 	p {
		 		font-family: aktiv-grotesk, sans-serif;
				font-style: normal;
				font-weight: 300;
				font-size: 12px;
		 	}

		 	.email, .password {
		 		margin-left: auto;
		 		margin-right: auto;
		 		width: 60%;
		 	}

		}


		/* Desktop size */
		@media (min-width: 992px) {
			#back {
		 		width: 40px;
		 		position: absolute;
		 		left: 19%;
		 		top: 15%;
		 		background-color: white;
		 		border-radius: 55%;
		 	}

		 	p {
		 		font-family: aktiv-grotesk, sans-serif;
				font-style: normal;
				font-weight: 300;
				font-size: 13px;
		 	}

		 	.email, .password {
		 		margin-left: auto;
		 		margin-right: auto;
		 		width: 50%;
		 	}
		}

	 	body {
	 		background-image: url("images/register.png");
	 		background-size: 100%;
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

	 	#firstname, #username, #email, #password {
	 		border: 1px solid black;
			border-radius: 30px;
	 	}
	 	
		.submit {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 500;
			font-style: normal;
		}
		

	 </style>

</head>
<body>

	<?php include 'nav.php'; ?>

	<a href="index.php"><img id="back" class="exit" src="images/x_button.png" alt="x-button"></a>

	<div class="container">

		<h1> Register </h1>
		<div class="paragraph">
			<p> With this new account, we can create and store your pop fridge items in our database! We just need a few things from you. </p>
		</div>

		<form action="register_confirm.php" method="POST">

			<div class="row"> 
				<div class="col-md-6 col-sm-12">
		      		<label for="firstname">First Name</label>
		      		<input id="firstname" name="firstname" type="text" class="form-control"/>
		      		<small id="firstname-error" class="invalid-feedback">First Name is required.</small>
		      	</div>

				<div class="col-md-6 col-sm-12">
		      		<label for="username">Username</label>
		      		<input id="username" name="username" type="text" class="form-control"/>
		      		<small id="username-error" class="invalid-feedback">Username is required.</small>
		      	</div>
	    	</div>

	    	<br>

	    	<div class="email"> 
	      		<label for="email">Email</label>
	      		<input id="email" name="email" type="email" class="form-control"/>
	      		<small id="email-error" class="invalid-feedback">Email is required.</small>
	    	</div>

	    	<br>

	    	<div class="password"> 
	      		<label for="password">Password</label>
	      		<input id="password" name="password" type="password" class="form-control"/>
	      		<small id="password-error" class="invalid-feedback">Password is required.</small>
	    	</div>

	    	<br>

	      	<div class="submit">
				<button type="submit" class="submit btn btn-primary black-button"> Register </button>
			</div> 

		</form>

	</div> <!-- end of container -->

	<script>
		// Client-side input validation
		document.querySelector('form').onsubmit = function(){
			if ( document.querySelector('#firstname').value.trim().length == 0 ) {
				document.querySelector('#firstname').classList.add('is-invalid');
			} else {
				document.querySelector('#firstname').classList.remove('is-invalid');
			}

			if ( document.querySelector('#username').value.trim().length == 0 ) {
				document.querySelector('#username').classList.add('is-invalid');
			} else {
				document.querySelector('#username').classList.remove('is-invalid');
			}

			if ( document.querySelector('#email').value.trim().length == 0 ) {
				document.querySelector('#email').classList.add('is-invalid');
			} else {
				document.querySelector('#email').classList.remove('is-invalid');
			}

			if ( document.querySelector('#password').value.trim().length == 0 ) {
				document.querySelector('#password').classList.add('is-invalid');
			} else {
				document.querySelector('#password').classList.remove('is-invalid');
			}

			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
	</script>


</body>
</html>