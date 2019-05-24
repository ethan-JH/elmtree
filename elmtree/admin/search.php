<?php
	
	session_start();
	
	if(!isset($_SESSION['40146582_id'])){
		header('Location: ../index.php');
	}
	
	include("../conn.php");
	
	$searchword = $conn->real_escape_string($_POST['searchdata']);
  
	$read = "SELECT * FROM `elmtree_books` 
		INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid
		INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid
		WHERE elmtree_books.title LIKE '%$searchword%' 
		OR elmtree_books.author LIKE '%$searchword%'";
  
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;	
	}
	
	$myuserid = $_SESSION['40146582_id'];
	$myusername = $_SESSION['40146582_user'];
	$myfirstname = $_SESSION['40146582_firstname'];
	$adminrole = $_SESSION['40146582_admin'];
  
?>

	<?php
		include("../markup/adminheadmarkup.php");
	?>
	
	<body>

    <!-- Nav bar details -->
	<?php
		include("../markup/admintopnav.php");
	?>
	
	<!-- jumbotron on welcome page -->
    <section class="jumbotron">
      <div class="container">
        <?php
			echo "<h2><strong>Results for '$searchword'</strong></h2>";
		?>
      </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
			
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
											<img class='card-img-top' alt='Thumbnail' style='height:400px; width: 100%; display: block;' src='../bookimages/$imgpath' data-holder-rendered='true'>
											<div class='card-body'>
												<p class='card-text'>$titledata</p>
												<p class='card-text'>$authordata</p>
												<p class='card-text'>&pound$pricedata</p>
												<p class='card-text'>$conditiondata</p>
												<div class='d-flex justify-content-between align-items-center'>
												
												  <a class='btn btn-lg btn-outline-success' href='book.php?bookid=$bookid'>View</a>";
												
							if($myuserid == $sellerid){
								echo "<a class='btn btn-warning' href='edit.php?bookid=$bookid'>Edit</a>";
							} elseif($adminrole == 1){
								echo "<small class='text-muted'>$sellername</small>";
								echo "<a class='btn btn-warning' href='edit.php?bookid=$bookid'>Edit</a>";
							} else{
								echo "<small class='text-muted'>$sellername</small>";
							}
							
							echo	"</div>
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
		include("../markup/endmarkup.php");
	?>