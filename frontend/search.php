<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Page</title>

	<meta charset="utf-8">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.typekit.net/kxb7vcn.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	 <link rel="stylesheet" href="style.css">
	
	<style>

		@media (max-width: 767px) {
			.search {
				width: 90%;
			}

			.button {
				width: 100%;
			}

			.bottom {
				margin-left: 15%;
			}

			#logoimg {
	 			width: 30%;
	 			align-self: center;
	 		}

	 		.filler {
	 			display: none;
	 		}

	 		#back {
	 			margin-right: 5px;
	 		}

		}

		@media (min-width: 768px) {

		 	#logoimg {
		 		width: 20%;
		 		align-self: center;
		 	}
	 	}


		.search {
			margin-top: 2%;
			margin-left: auto;
			margin-right: auto;
	        font-size: 22px;
	        font-weight: 900;
	        text-align: center;
	        color: #ff8b88;
    	}

		.search .search__input { 
			width: 50%;    
	        padding: 12px 24px;
	        background-color: transparent;
	        transition: transform 250ms ease-in-out;
	        font-size: 14px;
	        line-height: 18px;
	        font-family: aktiv-grotesk-extended, sans-serif;
			font-style: normal;
			font-weight: 500;

	        color: #575756;
	        background-color: transparent;

      		background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E");
	        background-repeat: no-repeat;
	        background-size: 18px 18px;
	        background-position: 95% center;
	        border-radius: 50px;
	        border: 1px solid #575756;
	        transition: all 250ms ease-in-out;
	        backface-visibility: hidden;
	        transform-style: preserve-3d;
    	}

		.search .search__input::placeholder {
            color: rgba(87, 87, 86, 0.8);
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

		.search .search__input:hover,
        .search__input:focus {
            padding: 12px 0;
            outline: 0;
            border: 1px solid transparent;
            border-bottom: 1px solid #575756;
            border-radius: 0;
            background-position: 100% center;
        }

        .container {
        	width: 60%;
        	height: 380px;
        	align-content: center;
        	overflow: scroll;
        }

        .col-5 {
        	width: 15%;
        	margin-left: 2%;
        	margin-right: 2%;
        	margin-bottom: 3%;
        	padding: 3%;
        	border: 2px solid black;
        }

        .list-category {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 500;
			font-style: normal;
			margin-bottom: 1px;
		}

		.list-day {
			margin-top: 0px;
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 500;
			font-style: normal;
			font-size: 11px;
		}

		.title {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 700;
			font-style: normal;
			margin-bottom: 2px;
		}

		.plus {
			position: relative;
			left: 85%;
			background-color: transparent;
			border: none;
		}

		.bottom {
			margin-left: auto;
			margin-right: auto;
			width: 50%;
			margin-top: 2%;
		}

		.question {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-style: normal;
			font-weight: 500;
			text-align: center;		
		}

		.add-item {	
			font-family: aktiv-grotesk-extended, sans-serif;
			font-style: normal;
			font-weight: 700;		
			background: white;

			color: black;
			border: 1px solid black;
			border-radius: 30px;
			padding-left: 20px;
			padding-right: 20px;
		}

		.add-item:hover, .add-item:active, .add-item:focus, .add-item:active:focus {
			background-color: black;
			color: white;
			border: 1px solid black;
		}

		.button {
			align-content: center;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
		}

	 	.exit {
	 		margin-right: 3%;
	 		width: 30px;
	 		background-color: white;
	 	}

	 	.logo {
	 		margin-top: 2%;
	 		text-align: center;
	 	}

	 	.filler {
	 		width: 100%;
		}

		::-webkit-scrollbar {
			width: 0px;
			background: transparent;
		}

	</style> 			
</head>
<body>

	<?php include 'nav.php'; ?>

<!-- 	<div class="logo">
		<a id="logo" class="navbar-brand" href="main.php"><img id="logoimg" src="images/logo.png" alt="logo"></a>
	</div> -->

	<div>
        <div class="search">  		
          		<form id="hide" action="" method=""><a href="main.php" id="back"><img class="exit" src="images/go-back.png" alt="x-button"></a>
              	<input class="search__input" id="search-term-id" type="text" placeholder="Search">
        </div>
    </div>

    <br>

    <div class="container">
    	<br>
    	<img class="filler" src="images/starter.png">
    </div> <!-- end of container -->

    <div class="bottom">
    	<p class="question"> Couldn't find what you're looking for? </p>
    	<div class="button">
			<button type="button" class="add-item" onclick="window.location.href='add.php';"> Add an item </button>
		</div>
	</div>

	<script>

		function ajaxGet(endpointUrl, returnFunction){
			var xhr = new XMLHttpRequest();
			xhr.open('GET', endpointUrl, true);
			xhr.onreadystatechange = function(){
				if (xhr.readyState == XMLHttpRequest.DONE) {
					if (xhr.status == 200) {
						returnFunction( xhr.responseText );
					} else {
						alert('AJAX Error.');
						console.log(xhr.status);
					}
				}
			}
			xhr.send();
		};

		document.querySelector("form").onsubmit = function(event) {
			event.preventDefault();

			let searchTerm = document.querySelector("#search-term-id").value.trim();
			ajaxGet("search_backend.php?term=" + searchTerm, function(results){

				// Convert results JSON string into JS objects
				results = JSON.parse(results);
				console.log(results);

				// Display the results on the browser
				let resultsList = document.querySelector(".container");

				// Clear previous results upon every search
				while(resultsList.hasChildNodes()) {
					resultsList.removeChild(resultsList.lastChild);
				}

				if (results.length == 0) {
					let img = document.createElement("img");
					img.classList.add("filler");
					img.setAttribute('src', 'images/no_results.png');
					resultsList.appendChild(img);
				}

				else {
					let row = document.createElement("div");
					row.classList.add("row"); 
					row.classList.add("justify-content-center"); 
					resultsList.appendChild(row);

					for (let i = 0; i < results.length; i++) {
						
						let col = document.createElement("div");
						col.classList.add("col-5");

						let h6 = document.createElement("h6");
						h6.classList.add("title");
						h6.innerHTML = results[i].produce;
						h6.addEventListener("click",function() {	
							<?php if(isset($_SESSION['user']) && !empty($_SESSION['user']) && ($_SESSION['user']) == 1) : ?>
								console.log(<?php echo $_SESSION['user']; ?>);
							    if (confirm("Are you sure you want to delete this item from the database? (Note: Admin Users Only)")) {
							    	ajaxGet("search_delete.php?produce_id=" + results[i].produce_id, function(results) {
							    		console.log(results);
										window.location = "search.php";
									});	
							    }
							<?php else: ?>
						    <?php endif; ?>	
									
						});

						let p1 = document.createElement("p");
						p1.classList.add("list-category");
						p1.innerHTML = "Category: " + results[i].category;

						let p2 = document.createElement("p");
						p2.classList.add("list-day");
						p2.innerHTML = "Expires in " + results[i].expire_days + " days";


						let plus_button = document.createElement("button");
						plus_button.setAttribute('type', 'button');
						plus_button.classList.add("plus");

						// create an 'onclick function' for button
						plus_button.addEventListener("click",function() {	
							
							<?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) : ?>
								if (confirm("You cannot add items as a Guest, but you can register for your own pop fridge!")) {
									window.location = "register.php";
								}
							<?php else: ?>
								ajaxGet("search_add.php?produce=" + results[i].produce, function(results) {
									console.log(results);
									window.location = "main.php";
								});	
							<?php endif; ?>			
						});

						let i_square = document.createElement("i");
						i_square.classList.add("far");
						i_square.classList.add("fa-plus-square");
						plus_button.appendChild(i_square);

						col.appendChild(h6);
						col.appendChild(p1);
						col.appendChild(p2);
						col.appendChild(plus_button);

						if (i%2 == 0 && i != 0) {					
							let row = document.createElement("div");
							row.classList.add("row"); 
							row.classList.add("justify-content-center"); 
							resultsList.appendChild(row);
						}

						row.appendChild(col);
						
					}
			
				} // end of else
			});			
		} // end of search submit function

    </script>

</body>
</html>