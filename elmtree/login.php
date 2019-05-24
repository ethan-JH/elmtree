<?php

	include("conn.php");
  
?>

<?php
	include("markup/headmarkup.php");
?>

<body>
	
    <!-- Nav bar details -->
	<?php	
		include("markup/topnav.php");	
	?>
	<div class="container text-center">
		<div class="row justify-content-center">
		<div class="col-6 align-self-center">
		
			<form class="form-signin" action="authlogin.php" method="POST">
				  <br> 		
				  <img class="mb-4" src="images/elmtree_logo.jpg" width="72" height="72">
				  <h1 class="h3 mb-3 font-weight-normal toppadding">Welcome back to Elm Tree</h1>
				  <label for="inputUsername" class="sr-only">Username</label>
				  <input type="username" id="inputUsername" class="form-control mb-6" placeholder="Username" required="" autofocus="" name="postuser">
				  <label for="inputPassword" class="sr-only">Password</label>
				  <input type="password" id="inputPassword" class="form-control mb-6" placeholder="Password" required="" name="postpass">
				  <br>
				  <button class="btn btn-lg btn-success btn-block mb-4" type="submit">Sign in</button>
			</form>
		</div>
		</div>
		<p class="mt-5 mb-3"><a href="register.php" class="btn btn-warning btn-lg">New? Register here</a></p>
	
	</div>
<?php
	include("markup/endmarkup.php");
?>