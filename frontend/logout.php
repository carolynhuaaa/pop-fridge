<?php
	session_start();
	session_destroy();
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

	 		body {
		 		margin-top: 45px;
		 		background-image: url("images/register.png");
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
	 		background-image: url("images/register.png");
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

		.submit {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 700;
			font-style: normal;
		}


	 </style>

</head>
<body>

	<div class="container">
		<h1> Log Out </h1>
		<div class="paragraph">
			<p> We're sorry to see you go! Log back in to see what items are expiring soon in your pop fridge. </p>
		</div>


      	<div class="submit">
      		<button type="button" class="black-button" onclick="window.location.href='index.php';"> Log In Again </button>
		</div> 

	</div> <!-- end of container -->



</body>
</html>