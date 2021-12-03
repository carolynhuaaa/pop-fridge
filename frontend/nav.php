
<nav class="navbar navbar-custom navbar-expand-md navbar-light">
  	<a id="logo" class="navbar-brand" href="main.php"><img id="logoimg" src="images/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
            <?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) : ?>
        		  <a class="nav-link" href="index.php"><span class="nav-text-active">Login</span><span class="sr-only">(current)</span></a>
            <?php else: ?>
              <a class="nav-link" href="logout.php"><span class="nav-text-active">Logout</span><span class="sr-only">(current)</span></a>
            <?php endif; ?>
      		</li>
      		<li class="nav-item">
        		<a class="nav-link" href="register.php"><span class="nav-text">Register</span></a>
      		</li>
      		<li class="nav-item">
        		<a class="nav-link" href="search.php"><span class="nav-text">Search</span></a>
      		</li>
    	</ul>
  	</div>
</nav> 


