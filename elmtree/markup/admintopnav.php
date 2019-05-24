<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">
			<h1><img src="../images/elmtree_logo.jpg" width="50" height="50" class="d-inline-block align-top" alt="">
			<strong>ELM</strong> TREE
			</h1>
			</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Buy
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="allbooks.php">View all</a>
							<a class="dropdown-item" href="categorylist.php">Browse Categories</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Sell
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="addnewbook.php">Sell New Book</a>
							<a class="dropdown-item" href="editbooklist.php">Edit your Books</a>
						</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="myprofile.php">Your Profile<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="viewpurchases.php">Purchase History<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="viewmessages.php">View Messages<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="signout.php">Sign out<span class="sr-only">(current)</span></a>
					</li>
					<?php
						if($adminrole == 1){
							echo"<li class='nav-item active'>
									<a class='nav-link' href='viewusers.php'>View Users<span class='sr-only'>(current)</span></a>
								</li>";
						}
					?>
				</ul>
				<form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
					<input class="form-control mr-sm-2" type="search" placeholder="Search for an author or title" aria-label="Search" name="searchdata">
					<input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">
				</form>
			</div>
		</nav>