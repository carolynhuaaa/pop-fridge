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

	session_start();

	$sql_categories = "SELECT * FROM categories;";
	$results_categories = $mysqli->query($sql_categories);
	if ( $results_categories == false ) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();
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
	 			margin-left: auto;
		 		margin-right: auto;
	 			width: 80%;
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

		 	#expire {
				width: 35%;
				border: 1px solid black;
				border-radius: 30px;

				font-family: aktiv-grotesk-extended, sans-serif;
				font-style: normal;
				font-weight: 500;

				background: white;
				color: black;
				border: 1px solid black;
				border-radius: 30px;
				padding-left: 20px;
				padding-right: 20px;
			}

	 	}

	 	@media (min-width: 767px) {
	 		.name {
		 		margin-left: auto;
		 		margin-right: auto;
		 		width: 50%;
		 	}

			#expire {
				width: 20%;
				border: 1px solid black;
				border-radius: 30px;

				font-family: aktiv-grotesk-extended, sans-serif;
				font-style: normal;
				font-weight: 500;

				background: white;
				color: black;
				border: 1px solid black;
				border-radius: 30px;
				padding-left: 20px;
				padding-right: 20px;
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

	 	#item-name {
	 		border: 1px solid black;
			border-radius: 30px;
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
			<p> Since our datebase doesn't have the produce item you're looking for, you can add it yourself. </p>
			<p> We just need these three things. </p>
		</div>

		<form action="add_confirm.php" method="POST">
			<div class="name"> 
	      		<label for="item-name">Item Name</label>
	      		<input id="item-name" name="item-name" type="text" class="form-control"/>
	      		<small id="item-name-error" class="invalid-feedback">Please enter an item name!</small>
	    	</div>

	    	<br>

	    	<div class="category">
				<select name="category" id="category" class="pill category">
					<option value="select"> Category </option>
					<?php while($row = $results_categories->fetch_assoc() ): ?>

						<option value="<?php echo $row['category_id']; ?>">
							<?php echo $row['name']; ?>
						</option>

					<?php endwhile; ?>
					<small id="category-error" class="invalid-feedback">Please enter a category!</small>
				</select>
			</div>

			<br> 

			<div class="days">
				<label for="expire">Days to Expire</label>
      			<input id="expire" name="expire" type="number"/>
      			<small id="expire-error" class="invalid-feedback">Please enter a number of days!</small>
	      	</div>

	      	<br> 
	      	<br> 

	      	<div class="submit">
				<button type="submit" class="submit btn btn-primary black-button"> Submit </button>
			</div> 
		</form>

	</div> <!-- end of container -->


	<script>

      // Client-side input validation:
      document.querySelector('form').onsubmit = function(){
        // If login-error is currently displayed, clear it.
       
        if (document.querySelector('#item-name').value.trim().length == 0) {
        	document.querySelector('#item-name').classList.add('is-invalid');
        } else {
        	var name = document.querySelector('#item-name').value;
        	name = name.substr(0, 1).toUpperCase() + name.substr(1);
        	document.querySelector('#item-name').value = name;
        	document.querySelector('#item-name').classList.remove('is-invalid');
        }

        if (document.querySelector('#expire').value.trim().length == 0)
        {
        	document.querySelector('#expire').classList.add('is-invalid');
        } else {
          document.querySelector('#expire').classList.remove('is-invalid');
        }
		
		return (!document.querySelectorAll('.is-invalid').length > 0);

    }

    </script>


</body>
</html>