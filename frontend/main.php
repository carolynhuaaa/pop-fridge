<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title> Main Page </title>

	 <meta charset="utf-8">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.typekit.net/kxb7vcn.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	 <link rel="stylesheet" href="style.css">
	<style>

		/* Phone Tablet size */
		@media (max-width: 991px) {

			.fridge {
				width: 485px;
			}

			.col {
				margin-bottom: 7%;
			}
		}

		/* Desktop size */
		@media (min-width: 992px) {


			.fridge {
				width: 485px;
				margin-bottom: 20px;
			}

			.container {
				margin-left: 2%;
				animation-duration: 2s;
				animation-name: slidein;
			}

		}

		@keyframes slidein {
		  	from {
		    	margin-left: 100%;
		  	}

		  	to {
		    	margin-left: 2%;
		  	}
		}

		.title, .submit, label, h6, h4 {
			font-family: aktiv-grotesk-extended, sans-serif;
			font-weight: 700;
			font-style: normal;
			margin-bottom: 2px;
		}

		.list-expiration {
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

		.category-title {
			text-align: center;
		}

		.blank-post {
			background-color: white;
		}

		.open-note {
			width: 90%;
		}

		#small {
			font-size: 15px;
		}


		.post-it {
			border: 3px solid black;
			width: 400px;
			height: 400px;
			background-color: white;
		}

		.color {
			padding-left: 3%;
			padding-right: 3%;
			padding-top: 5%;
			width: 396px;
			height: 396px;
			overflow-y: scroll;
		}

		.shelf-1 {
			opacity: 0;
			background-color: rgba(255, 35, 193);
			width: 190px;
			height: 64px;

			position: absolute;
			top: 4px;
			left: 218px;
		}

		.shelf-1:hover, .shelf-1:active, .shelf-1:focus, .shelf-1:active:focus {
			opacity: 0.3;
		}

		.shelf-2 {
			opacity: 0;
			background-color: rgba(0, 224, 255);
			width: 190px;
			height: 113px;

			position: absolute;
			top: 73px;
			left: 218px;
		}

		.shelf-2:hover {
			opacity: 0.3;
		}

		.shelf-3 {
			opacity: 0;
			background-color: rgba(255, 132, 44);
			width: 190px;
			height: 90px;

			position: absolute;
			top: 191px;
			left: 218px;
		}

		.shelf-3:hover, .shelf-3:active, .shelf-3:focus, .shelf-3:active:focus {
			opacity: 0.3;
		}

		.shelf-4 {
			opacity: 0;
			background-color: rgba(173, 201, 0);
			width: 190px;
			height: 110px;

			position: absolute;
			top: 283px;
			left: 218px;
		}

		.shelf-4:hover, .shelf-4:active, .shelf-4:focus, .shelf-4:active:focus {
			opacity: 0.3;
		}

		.shelf-5 {
			opacity: 0;
			background-color: rgba(255, 196, 44);
			width: 190px;
			height: 163px;

			position: absolute;
			top: 399px;
			left: 218px;
		}

		.shelf-5:hover, .shelf-5:active, .shelf-5:focus, .shelf-5:active:focus {
			opacity: 0.3;
		}

		body {
			margin-bottom: 3%;
			margin-left: auto;
			margin-right: auto;
			background-color: #DAF0FF;
		}

		.navbar {
			background-color: #DAF0FF;
		}

		::-webkit-scrollbar {
			width: 0px;
			background: transparent;
		}

	</style>
</head>
<body>

	<?php include 'nav.php'; ?>

    <br> 

    <div class="container">
    	<div class="row">
    		<div class="col">
    			<img class="fridge" src="images/refrigerator.png"/>
    			<div class="shelf-1"></div>
    			<div class="shelf-2"></div>
    			<div class="shelf-3"></div>
    			<div class="shelf-4"></div>
    			<div class="shelf-5"></div>
    		</div>

    		<div class="col col-text">

    			<?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) : ?>
    				<h1 class="title"> Hi there! </h1>
    			<?php else: ?>
              		<h1 class="title"> Hi, <?php echo $_SESSION["firstname"]; ?>! </h1>
            	<?php endif; ?>

    			<br>
    			<button type="button" class="pill expire">
		            Expiring Soon
		        </button>
		        <button type="button" class="pill" onclick="window.location.href='search.php';">
		            Search Item
		        </button>

		        <br>
		        <br>
		        <div class="post-it">
		        	<div class="color">
			        	<h4 class="category-title"></h4>
			        	<br>
			        	<ul id="list">
			        		<h4> Welcome to your <br> pop fridge!<h4>
			        		<br>
			        		<p id="small" class="list-expiration"> Go ahead and explore by <br> clicking on the shelves that will <br> <em> display your fridge contents by category. </em></p>
			        		<br>
			        		<p id="small" class="list-expiration"> <strong> Add an item? </strong> <br> Go to the Search Page <br> <br>
			        			<strong> Edit or Delete an item? </strong> <br> Click on the Item Name </p>

			        	</ul>
			        </div>
		        </div> <!-- post-it -->

    		</div> <!-- col -->

    		</form>
    	</div> <!-- row -->

    </div> <!-- container -->

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

		document.querySelector('.shelf-1').onmouseover = function(){
     		this.style.opacity = '0.3';
     	}
     	document.querySelector('.shelf-2').onmouseover = function(){
     		this.style.opacity = '0.3';
     	}
     	document.querySelector('.shelf-3').onmouseover = function(){
     		this.style.opacity = '0.3';
     	}
     	document.querySelector('.shelf-4').onmouseover = function(){
     		this.style.opacity = '0.3';
     	}
		document.querySelector('.shelf-5').onmouseover = function(){
     		this.style.opacity = '0.3';
     	}

     	document.querySelector('.shelf-1').onmouseleave = function(){
     		this.style.opacity = '0';
     	}
     	document.querySelector('.shelf-2').onmouseleave = function(){
     		this.style.opacity = '0';
     	}
     	document.querySelector('.shelf-3').onmouseleave = function(){
     		this.style.opacity = '0';
     	}
     	document.querySelector('.shelf-4').onmouseleave = function(){
     		this.style.opacity = '0';
     	}
		document.querySelector('.shelf-5').onmouseleave = function(){
     		this.style.opacity = '0';
     	}

		let searchUser = <?php echo $_SESSION["user"];?>;

      	document.querySelector('.shelf-1').onclick = function(){
      		this.style.opacity = '0.3';
      		document.querySelector('.shelf-2').style.opacity = '0';
      		document.querySelector('.shelf-3').style.opacity = '0';
      		document.querySelector('.shelf-4').style.opacity = '0';
      		document.querySelector('.shelf-5').style.opacity = '0';
      		document.querySelector('.color').style.background = 'rgba(255, 35, 193, 0.3)';
      		document.querySelector('.category-title').innerHTML = 'Miscellaneous';

      		ajaxGet("main_backend.php?user=" + searchUser, function(results){
      			results = JSON.parse(results);
				console.log(results);

				let resultsList = document.querySelector("#list");

				// Clear previous results upon every search
				while(resultsList.hasChildNodes()) {
					resultsList.removeChild(resultsList.lastChild);
				}

				for (let i = 0; i < results.length; i++) {
					let li = document.createElement("li");

					// <h6> Item 1 </h6>
	       			// <p class="list-expiration"> Category </p>
	    			// <p class="list-day"> Days Left: 5 </p>

					let h6 = document.createElement("h6");
					h6.innerHTML = results[i].produce;
					h6.addEventListener("click",function() {	
						<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
							window.location = "edit.php";	
					    <?php endif; ?>				
					});

					let p1 = document.createElement("p");
					p1.classList.add("list-expiration");
					<?php $today = date("Y-m-d");?>;
					let today = "<?php echo $today?>";
					var startDate = Date.parse(today);
					var endDate = Date.parse(results[i].date_expired);
					var timeDiff = endDate - startDate;
					var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
					if (daysDiff < 0) {
						daysDiff = 0;
						p1.innerHTML = "Days Left: Expired"
					}
					else {p1.innerHTML = "Days Left: " + daysDiff;}

					let p2 = document.createElement("p");
					p2.classList.add("list-day");
					p2.innerHTML = "Expiration: " + results[i].date_expired;

					if (results[i].category == "Miscellaneous")
					{
						li.appendChild(h6);
						li.appendChild(p1);
						li.appendChild(p2);
						resultsList.appendChild(li);
					}
				}

				if (!resultsList.hasChildNodes())
				{
					let p = document.createElement("p");
					p.innerHTML = "You currently have no produce in this category.";
					p.classList.add("list-day");
					resultsList.appendChild(p);
				}

      		});
     	}

     	document.querySelector('.shelf-2').onclick = function(){
     		this.style.opacity = '0.3';
      		document.querySelector('.shelf-1').style.opacity = '0';
      		document.querySelector('.shelf-3').style.opacity = '0';
      		document.querySelector('.shelf-4').style.opacity = '0';
      		document.querySelector('.shelf-5').style.opacity = '0';
        	document.querySelector('.color').style.background = 'rgba(0, 224, 255, 0.3)';
        	document.querySelector('.category-title').innerHTML = 'Fruit';

      		ajaxGet("main_backend.php?user=" + searchUser, function(results){
      			results = JSON.parse(results);
				console.log(results);

				let resultsList = document.querySelector("#list");

				// Clear previous results upon every search
				while(resultsList.hasChildNodes()) {
					resultsList.removeChild(resultsList.lastChild);
				}

				for (let i = 0; i < results.length; i++) {
					let li = document.createElement("li");

					// <h6> Item 1 </h6>
	       			// <p class="list-expiration"> Category </p>
	    			// <p class="list-day"> Days Left: 5 </p>

					let h6 = document.createElement("h6");
					h6.innerHTML = results[i].produce;
					h6.addEventListener("click",function() {	
						<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
							window.location = "edit.php";	
					    <?php endif; ?>				
					});

					let p1 = document.createElement("p");
					p1.classList.add("list-expiration");
					<?php $today = date("Y-m-d");?>;
					let today = "<?php echo $today?>";
					var startDate = Date.parse(today);
					var endDate = Date.parse(results[i].date_expired);
					var timeDiff = endDate - startDate;
					var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
					if (daysDiff < 0) {
						daysDiff = 0;
						p1.innerHTML = "Days Left: Expired"
					}
					else {p1.innerHTML = "Days Left: " + daysDiff;}

					let p2 = document.createElement("p");
					p2.classList.add("list-day");
					p2.innerHTML = "Expiration: " + results[i].date_expired;

					if (results[i].category == "Fruit")
					{
						li.appendChild(h6);
						li.appendChild(p1);
						li.appendChild(p2);
						resultsList.appendChild(li);
					}
				}

				if (!resultsList.hasChildNodes())
				{
					let p = document.createElement("p");
					p.innerHTML = "You currently have no produce in this category.";
					p.classList.add("list-day");
					resultsList.appendChild(p);
				}

      		});
     	}

     	document.querySelector('.shelf-3').onclick = function(){
     		this.style.opacity = '0.3';
     		document.querySelector('.shelf-1').style.opacity = '0';
      		document.querySelector('.shelf-2').style.opacity = '0';
      		document.querySelector('.shelf-4').style.opacity = '0';
      		document.querySelector('.shelf-5').style.opacity = '0';
        	document.querySelector('.color').style.background = 'rgba(255, 132, 44, 0.3)';
        	document.querySelector('.category-title').innerHTML = 'Meat & Cheese';
        	
        	ajaxGet("main_backend.php?user=" + searchUser, function(results){
      			results = JSON.parse(results);
				console.log(results);

				let resultsList = document.querySelector("#list");

				// Clear previous results upon every search
				while(resultsList.hasChildNodes()) {
					resultsList.removeChild(resultsList.lastChild);
				}

				for (let i = 0; i < results.length; i++) {
					let li = document.createElement("li");

					// <h6> Item 1 </h6>
	       			// <p class="list-expiration"> Category </p>
	    			// <p class="list-day"> Days Left: 5 </p>

					let h6 = document.createElement("h6");
					h6.innerHTML = results[i].produce;
					h6.addEventListener("click",function() {	
						<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
							window.location = "edit.php";	
					    <?php endif; ?>				
					});

					let p1 = document.createElement("p");
					p1.classList.add("list-expiration");
					<?php $today = date("Y-m-d");?>;
					let today = "<?php echo $today?>";
					var startDate = Date.parse(today);
					var endDate = Date.parse(results[i].date_expired);
					var timeDiff = endDate - startDate;
					var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
					if (daysDiff < 0) {
						daysDiff = 0;
						p1.innerHTML = "Days Left: Expired"
					}
					else {p1.innerHTML = "Days Left: " + daysDiff;}

					let p2 = document.createElement("p");
					p2.classList.add("list-day");
					p2.innerHTML = "Expiration: " + results[i].date_expired;

					if (results[i].category == "Meat & Cheese")
					{
						li.appendChild(h6);
						li.appendChild(p1);
						li.appendChild(p2);
						resultsList.appendChild(li);
					}
				}

				if (!resultsList.hasChildNodes())
				{
					let p = document.createElement("p");
					p.innerHTML = "You currently have no produce in this category.";
					p.classList.add("list-day");
					resultsList.appendChild(p);
				}

      		});
     	}

     	document.querySelector('.shelf-4').onclick = function(){
     		this.style.opacity = '0.3';
     		document.querySelector('.shelf-1').style.opacity = '0';
      		document.querySelector('.shelf-2').style.opacity = '0';
      		document.querySelector('.shelf-3').style.opacity = '0';
      		document.querySelector('.shelf-5').style.opacity = '0';
        	document.querySelector('.color').style.background = 'rgba(173, 201, 0, 0.3)';
        	document.querySelector('.category-title').innerHTML = 'Green Vegetables';

        	ajaxGet("main_backend.php?user=" + searchUser, function(results){
      			results = JSON.parse(results);
				console.log(results);

				let resultsList = document.querySelector("#list");

				// Clear previous results upon every search
				while(resultsList.hasChildNodes()) {
					resultsList.removeChild(resultsList.lastChild);
				}

				for (let i = 0; i < results.length; i++) {
					let li = document.createElement("li");

					// <h6> Item 1 </h6>
	       			// <p class="list-expiration"> Category </p>
	    			// <p class="list-day"> Days Left: 5 </p>

					let h6 = document.createElement("h6");
					h6.innerHTML = results[i].produce;
					h6.addEventListener("click",function() {	
						<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
							window.location = "edit.php";	
					    <?php endif; ?>				
					});

					let p1 = document.createElement("p");
					p1.classList.add("list-expiration");
					<?php $today = date("Y-m-d");?>;
					let today = "<?php echo $today?>";
					var startDate = Date.parse(today);
					var endDate = Date.parse(results[i].date_expired);
					var timeDiff = endDate - startDate;
					var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
					if (daysDiff < 0) {
						daysDiff = 0;
						p1.innerHTML = "Days Left: Expired"
					}
					else {p1.innerHTML = "Days Left: " + daysDiff;}

					let p2 = document.createElement("p");
					p2.classList.add("list-day");
					p2.innerHTML = "Expiration: " + results[i].date_expired;

					if (results[i].category == "Green Vegetables")
					{
						li.appendChild(h6);
						li.appendChild(p1);
						li.appendChild(p2);
						resultsList.appendChild(li);
					}
				}

				if (!resultsList.hasChildNodes())
				{
					let p = document.createElement("p");
					p.innerHTML = "You currently have no produce in this category.";
					p.classList.add("list-day");
					resultsList.appendChild(p);
				}

      		});
     	}

     	document.querySelector('.shelf-5').onclick = function(){
     		this.style.opacity = '0.3';
     		document.querySelector('.shelf-1').style.opacity = '0';
      		document.querySelector('.shelf-2').style.opacity = '0';
      		document.querySelector('.shelf-3').style.opacity = '0';
      		document.querySelector('.shelf-4').style.opacity = '0';
        	document.querySelector('.color').style.background = 'rgba(255, 196, 44, 0.3)';
        	document.querySelector('.category-title').innerHTML = 'Color Vegetables';

        	ajaxGet("main_backend.php?user=" + searchUser, function(results){
      			results = JSON.parse(results);
				console.log(results);

				let resultsList = document.querySelector("#list");

				// Clear previous results upon every search
				while(resultsList.hasChildNodes()) {
					resultsList.removeChild(resultsList.lastChild);
				}

				for (let i = 0; i < results.length; i++) {
					let li = document.createElement("li");

					// <h6> Item 1 </h6>
	       			// <p class="list-expiration"> Category </p>
	    			// <p class="list-day"> Days Left: 5 </p>

					let h6 = document.createElement("h6");
					h6.innerHTML = results[i].produce;
					h6.addEventListener("click",function() {	
						<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
							window.location = "edit.php";	
					    <?php endif; ?>				
					});

					let p1 = document.createElement("p");
					p1.classList.add("list-expiration");
					<?php $today = date("Y-m-d");?>;
					let today = "<?php echo $today?>";
					var startDate = Date.parse(today);
					var endDate = Date.parse(results[i].date_expired);
					var timeDiff = endDate - startDate;
					var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
					if (daysDiff < 0) {
						daysDiff = 0;
						p1.innerHTML = "Days Left: Expired"
					}
					else {p1.innerHTML = "Days Left: " + daysDiff;}

					let p2 = document.createElement("p");
					p2.classList.add("list-day");
					p2.innerHTML = "Expiration: " + results[i].date_expired;

					if (results[i].category == "Color Vegetables")
					{
						li.appendChild(h6);
						li.appendChild(p1);
						li.appendChild(p2);
						resultsList.appendChild(li);
					}
				}

				if (!resultsList.hasChildNodes())
				{
					let p = document.createElement("p");
					p.innerHTML = "You currently have no produce in this category.";
					p.classList.add("list-day");
					resultsList.appendChild(p);
				}

      		});
     	}

     	document.querySelector('.expire').onclick = function(){
     		document.querySelector('.shelf-1').style.opacity = '0';
      		document.querySelector('.shelf-2').style.opacity = '0';
      		document.querySelector('.shelf-3').style.opacity = '0';
      		document.querySelector('.shelf-4').style.opacity = '0';
      		document.querySelector('.shelf-5').style.opacity = '0';
     		document.querySelector('.color').style.background = 'rgba(255, 255, 255, 0.3)';
     		document.querySelector('.category-title').innerHTML = 'Expiring Soon';

     		ajaxGet("main_backend.php?user=" + searchUser, function(results){
      			results = JSON.parse(results);
				console.log(results);

				let resultsList = document.querySelector("#list");

				// Clear previous results upon every search
				while(resultsList.hasChildNodes()) {
					resultsList.removeChild(resultsList.lastChild);
				}

				for (let i = 0; i < results.length; i++) {
					let li = document.createElement("li");

					// <h6> Item 1 </h6>
	       			// <p class="list-expiration"> Category </p>
	    			// <p class="list-day"> Days Left: 5 </p>

					let h6 = document.createElement("h6");
					h6.innerHTML = results[i].produce;
					h6.addEventListener("click",function() {	
						<?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
							window.location = "edit.php";	
					    <?php endif; ?>				
					});
					
					let p1 = document.createElement("p");
					p1.classList.add("list-expiration");
					<?php $today = date("Y-m-d");?>;
					let today = "<?php echo $today?>";
					var startDate = Date.parse(today);
					var endDate = Date.parse(results[i].date_expired);
					var timeDiff = endDate - startDate;
					var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
					if (daysDiff < 0) {
						daysDiff = 0;
						p1.innerHTML = "Days Left: Expired"
					}
					else {p1.innerHTML = "Days Left: " + daysDiff;}

					let p2 = document.createElement("p");
					p2.classList.add("list-day");
					p2.innerHTML = "Expiration: " + results[i].date_expired;

					if (daysDiff <= 3)
					{
						li.appendChild(h6);
						li.appendChild(p1);
						li.appendChild(p2);
						resultsList.appendChild(li);
					}
				}

				if (!resultsList.hasChildNodes())
				{
					let p = document.createElement("p");
					p.innerHTML = "(No products are expiring within the next 3 days)";
					p.classList.add("list-day");
					resultsList.appendChild(p);
				}

      		});
     	}
    </script>

</body>
</html>