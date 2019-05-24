<?php

	include("conn.php");
	
	$bookid = $conn->real_escape_string($_GET['bookid']);
  
	$read = "SELECT * FROM `elmtree_books` 
			INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid
			INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid
			WHERE elmtree_books.bookid = $bookid";
			
	$readcategory = "SELECT * FROM elmtree_books INNER JOIN elmtree_bookcategory_reference
					ON elmtree_books.bookid = elmtree_bookcategory_reference.bookid
					INNER JOIN elmtree_categories
					ON elmtree_bookcategory_reference.categoryid = elmtree_categories.categoryid
					WHERE elmtree_bookcategory_reference.bookid = $bookid";		
  
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;	
	}
	
	$categoryresult = $conn->query($readcategory);
	
	if(!$categoryresult){
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
	
	<div class="container bg-white toppadding">
          
			<div class="row bg-light border border-success">	
				<?php
					while($row = $result->fetch_assoc()){
						
						$bookid = $row["bookid"];
						$titledata=$row["title"];
						$authordata=$row["author"];
						$pricedata = $row["price"];
						$imgpath = $row["imgpath"];	
						$blurbdata = $row["blurb"];
						$conditiondata = $row["condition_type"];
						$conddesc = $row["description"];
						$sellerid = $row["sellerid"];
						$sellername = $row["username"];	
						
						echo "<div class='col-md-5'>
								<img src='bookimages/$imgpath' class='bookcard smallpadding'>	
							</div>
							<div class='col-md-6'>
								<h1 class='toppadding'>$titledata</h1>
								<h2 class='text-muted'>$authordata</h2>
								<p>$blurbdata</p>
								<p><strong>Categories: </strong>";				
						
						while($catrow = $categoryresult->fetch_assoc()){
							$categoryid = $catrow["categoryid"];
							$categorydata = $catrow["categoryname"];
							$catdescript = $catrow["categorydesc"];
							
							echo "<a href='category.php?catid=$categoryid' class='badge badge-secondary'>$categorydata </a>";
						}		
		
						echo	"</p>
								 <p>
									<h4 class='float-right'>Seller: <a href='profile.php?userid=$sellerid' class='badge badge-dark'>$sellername</a></h4>
									<span class='d-inline-block' tabindex='0' data-toggle='tooltip' title='$conddesc'>
										<button class='btn btn-warning' style='pointer-events: none;' type='button' disabled>$conditiondata</button>
									</span>
									
								</p>
								<p>
								<h2>&pound$pricedata <a class='btn btn-success btn-lg float-right' href='login.php'>BUY</a><h2>
								<p>
								</div>";
					}
				?>
				
							
				
			</div>
	</div>
<?php
	include("markup/endmarkup.php");
?>