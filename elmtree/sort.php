<?php

	include("conn.php");
	
	$sortby = $conn->real_escape_string($_GET['sortid']);
	
	if($sortby == '1'){
		$read = "SELECT * FROM `elmtree_books` INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid ORDER BY `elmtree_books`.`price` ASC ";
	} elseif ($sortby == '2') {
		$read = "SELECT * FROM `elmtree_books` INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid ORDER BY `elmtree_books`.`price` DESC ";
	} elseif ($sortby == '3') {
		$read = "SELECT * FROM `elmtree_books` INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid ORDER BY `elmtree_books`.`bookid` DESC ";
	} elseif ($sortby == '4') {
		$read = "SELECT * FROM `elmtree_books` INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid ORDER BY `elmtree_books`.`bookid` ASC ";
	} elseif ($sortby == '5') {
		$read = "SELECT * FROM `elmtree_books` INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid ORDER BY `elmtree_condition`.`conditionid` ASC ";
	} elseif ($sortby == '6') {
		$read = "SELECT * FROM `elmtree_books` INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid ORDER BY `elmtree_condition`.`conditionid` DESC ";
	} else {
		location();	
	}
  
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;	
	}
  
  
?>

	<?php
		include("markup/headmarkup.php");
	?>
	
	<body>

    <!-- Nav bar details -->
	<?php
		include("markup/topnav.php");
	?>

    <div class="album py-5 bg-light">
        <div class="container">
		<div class="row">
			<div class="col">
				<div class="dropdown float-right">
				  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Sort by
				  </button>
				<?php 
				   echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='sort.php?sortid=1'>Cheapest</a>
							<a class='dropdown-item' href='sort.php?sortid=2'>Most Expensive</a>
							<a class='dropdown-item' href='sort.php?sortid=3'>Recently added</a>
							<a class='dropdown-item' href='sort.php?sortid=4'>Oldest</a>
							<a class='dropdown-item' href='sort.php?sortid=5'>Best condition</a>
							<a class='dropdown-item' href='sort.php?sortid=6'>Worst condition</a>
						</div>";
				  ?>
				  <p> </p>
				</div>
			</div>
		</div>
			<div class='row'>
          
				
				<?php
					while($row = $result->fetch_assoc()){
						
						$bookid = $row["bookid"];
						$titledata=$row["title"];
						$authordata=$row["author"];
						$pricedata = $row["price"];
						$imgpath = $row["imgpath"];	
						$conditiondata = $row["condition_type"];
						$sellerid = $row["sellerid"];
						$sellername = $row["username"];	
						$visible = $row["publicvisible"];
						$bought = $row["purchased"];
						
						if($visible == 1 && $bought == 0){
							echo "<div class='col-md-4'>
									<div class='card mb-4 box-shadow border border-success'>
											<img class='card-img-top' alt='Thumbnail' style='height:400px; width: 100%; display: block;' src='bookimages/$imgpath' data-holder-rendered='true'>
											<div class='card-body'>
												<p class='card-text'>$titledata</p>
												<p class='card-text'>$authordata</p>
												<p class='card-text'>&pound$pricedata</p>
												<p class='card-text'>$conditiondata</p>
												<div class='d-flex justify-content-between align-items-center'>
												
												  <a class='btn btn-lg btn-outline-success' href='book.php?bookid=$bookid'>View</a>
												
													<small class='text-muted'>$sellername</small>
												</div>
											</div>
									</div>
								</div>";
						}
					}
				?>
		
			</div>
		</div>

	</div>	

    <?php
		include("markup/endmarkup.php");
	?>